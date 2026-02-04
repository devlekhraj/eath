<?php

namespace App\Services;

use App\Models\Gallery;
use App\Models\GalleryVariant;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\Encoders\AvifEncoder;
use Intervention\Image\Encoders\JpegEncoder;
use Intervention\Image\Encoders\WebpEncoder;
use Intervention\Image\ImageManager;

class GalleryImageService
{
    public function upload(UploadedFile $file): array
    {
        // CDN disk (R2/S3/Public) - configure as 'cdn'
        $disk = Storage::disk('cdn');

        // Immutable-safe content hash (folder key)
        $hash = substr(sha1_file($file->getRealPath()), 0, 20);

        $originalName = str_replace(' ', '-', $file->getClientOriginalName());
        // ✅ NEW: Folder structure => media/{hash}/
        $folder = "media/{$hash}";

        $existing = Gallery::where('hash', $hash)->first();
        if ($existing) {
            return [
                'gallery' => $existing,
                'deduped' => true,
                'warning' => null,
                'paths' => [
                    'master' => $existing->filepath,
                    'variants' => GalleryVariant::where('gallery_id', $existing->id)->pluck('file_path'),
                ],
            ];
        }

        // Read master (Intervention v3.11)
        $manager = new ImageManager(new Driver);
        $master = $manager->read($file);

        // Calculate ratio; 16:9 is recommended but other ratios are allowed
        $w = $master->width();
        $h = $master->height();
        $ratio = $w / max($h, 1);
        $target = 16 / 9;
        $tolerance = 0.02;
        $warning = null;
        if (abs($ratio - $target) > $tolerance) {
            $warning = "Recommended aspect ratio is 16:9. Received {$w}x{$h}.";
        }

        // ✅ NEW: Always store master as master.{ext} (no slug/date)
        $ext = strtolower($file->getClientOriginalExtension());
        $masterExt = $ext === 'png' ? 'png' : 'jpg';
        $masterName = "master.{$masterExt}";
        $masterPath = "{$folder}/{$masterName}";
        $masterContentType = $masterExt === 'png' ? 'image/png' : 'image/jpeg';

        // Optional: set cache headers (recommended for CDN)
        $putOptionsMaster = [
            'visibility' => 'public',
            'ContentType' => $masterContentType,
            // master is usually not served publicly; keep cache modest (or also immutable if you never overwrite)
            'CacheControl' => 'public, max-age=86400',
        ];

        // Store master on CDN
        $disk->put($masterPath, file_get_contents($file->getRealPath()), $putOptionsMaster);

        // ✅ Your chosen variants (width/ratio/formats)
        $specs = [
            ['width' => 240, 'ratio' => '16:9', 'formats' => ['webp', 'avif']],
            ['width' => 400, 'ratio' => '16:9', 'formats' => ['webp', 'avif']],
            ['width' => 800, 'ratio' => '16:9', 'formats' => ['webp', 'avif']],
            ['width' => 1280, 'ratio' => '16:9', 'formats' => ['webp', 'avif']],
            ['width' => 1920, 'ratio' => '16:9', 'formats' => ['webp', 'avif']],
            ['width' => 1200, 'height' => 630, 'ratio' => '1.91:1', 'formats' => ['jpg'], 'variant' => 'og', 'fit' => 'cover'],
        ];

        $variantRows = [];
        $now = now();

        // Variants
        foreach ($specs as $spec) {
            $vw = $spec['width'];
            $vh = $spec['height'] ?? null;
            $formats = $spec['formats'];
            $variantBase = $spec['variant'] ?? "w{$vw}";
            $fit = $spec['fit'] ?? 'scaleDown';
            $ratioSpec = $spec['ratio'] ?? null;

            if ($vh === null && $ratioSpec) {
                $ratioParts = explode(':', $ratioSpec, 2);
                $rw = (int) ($ratioParts[0] ?? 0);
                $rh = (int) ($ratioParts[1] ?? 0);
                if ($rw > 0 && $rh > 0) {
                    $vh = (int) round($vw * ($rh / $rw));
                }
            }

            if ($vh === null) {
                $vh = $h;
            }

            // Skip variants that would require upscaling.
            if ($w < $vw || $h < $vh) {
                continue;
            }

            foreach ($formats as $format) {
                try {
                    $img = clone $master;

                    if ($fit === 'cover') {
                        $img->cover($vw, $vh, 'center');
                    } else {
                        // Preserve original aspect ratio; avoid upscaling.
                        $img->scaleDown($vw, $vh);
                    }

                    if ($format === 'webp') {
                        $encoded = $img->encode(new WebpEncoder(quality: 82));
                        $variantName = "{$variantBase}.webp";
                        $contentType = 'image/webp';
                    } elseif ($format === 'avif') {
                        $encoded = $img->encode(new AvifEncoder(quality: 50));
                        $variantName = "{$variantBase}.avif";
                        $contentType = 'image/avif';
                    } else {
                        $encoded = $img->encode(new JpegEncoder(quality: 85));
                        $variantName = "{$variantBase}-{$vw}x{$vh}.jpg";
                        $contentType = 'image/jpeg';
                    }

                    $path = "{$folder}/{$variantName}";

                    $disk->put($path, (string) $encoded, [
                        'visibility' => 'public',
                        'ContentType' => $contentType,
                        // immutable is safe because URL includes hash and never changes
                        'CacheControl' => 'public, max-age=31536000, immutable',
                    ]);

                    $variantRows[] = [
                        'variant' => $variantBase,
                        'format' => $format,
                        'file_name' => $variantName,
                        'file_path' => $path,
                        'mime_type' => $contentType,
                        'size' => strlen((string) $encoded),
                        'disk' => 'cdn',
                        'width' => $img->width(),
                        'height' => $img->height(),
                    ];
                } catch (\Throwable $e) {
                    // log($e->getMessage()) if you want
                }
            }
        }

        // File sizes (master)
        $masterSize = $file->getSize(); // size of uploaded file (close enough for master.jpg as stored)

        $gallery = DB::transaction(function () use (
            $masterName,
            $masterPath,
            $masterSize,
            $w,
            $h,
            $variantRows,
            $now,
            $masterContentType,
            $hash,
            $originalName,
        ) {
            $gallery = Gallery::create([
                // Keep your fields, but now they map to hash-based storage
                'hash' => $hash,
                'filename' => $masterName,
                'filepath' => $masterPath,
                'mime_type' => $masterContentType,
                'file_size' => $masterSize,
                'width' => $w,
                'height' => $h,
                'title' => $originalName,
                'created_at' => $now,
            ]);

            foreach ($variantRows as $row) {
                GalleryVariant::create([
                    'gallery_id' => $gallery->id,
                    'variant' => $row['variant'],
                    'format' => $row['format'],
                    'file_name' => $row['file_name'],
                    'file_path' => $row['file_path'],
                    'mime_type' => $row['mime_type'],
                    'size' => $row['size'],
                    'disk' => $row['disk'],
                    'width' => $row['width'],
                    'height' => $row['height'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }

            return $gallery;
        });

        return [
            'gallery' => $gallery,
            'deduped' => false,
            'warning' => $warning,
            'paths' => [
                'master' => $masterPath,
                'variants' => collect($variantRows)->pluck('file_path'),
            ],
        ];
    }
}
