<?php

namespace App\Http\Controllers\Api\V1\Admin\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryUsage;
use App\Models\GalleryVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\JpegEncoder;
use Intervention\Image\Encoders\WebpEncoder;
use Intervention\Image\ImageManager;

class GalleryController1 extends Controller
{
    public function index()
    {
        // Logic to retrieve travel packages
        $packages = Gallery::all();

        return response()->json([
            'success' => true,
            'data' => $packages,
        ], 200);
    }

    public function show(Request $request, $id)
    {
        // Logic to retrieve travel packages
        $package = Gallery::find($id);

        return response()->json([
            'success' => true,
            'data' => $package,
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,jpeg', 'max:10240'],

            // usage metadata (per placement)
            'alt_text' => ['required', 'string', 'min:5', 'max:150'],
            'title' => ['nullable', 'string', 'max:120'],
            'description' => ['nullable', 'string', 'max:500'],

            // folder mapping (recommended)
            'section' => ['required', 'string', 'max:40'],   // treks|destinations|safety|about|...
            'page_slug' => ['required', 'string', 'max:160'],  // everest-base-camp-trek
            'context' => ['required', 'string', 'max:40'],   // hero|gallery|map|inline
            'date' => ['nullable', 'date_format:Y-m-d'],
        ]);

        $file = $request->file('image');

        // Folder: {section}/{page-slug}/{context}/{YYYY-MM-DD}/
        $section = Str::slug($data['section']);
        $pageSlug = Str::slug($data['page_slug']);
        $context = Str::slug($data['context']);
        $datePath = $data['date'] ?? now()->format('Y-m-d');

        $folder = "{$section}/{$pageSlug}/{$context}/{$datePath}";

        // Immutable-safe: content hash (URL changes only if image changes)
        $hash = substr(sha1_file($file->getRealPath()), 0, 10);

        // Filename base
        $baseName = "{$pageSlug}-{$context}-{$hash}";

        // Read master (Intervention v3)
        $manager = new ImageManager(new Driver);
        $master = $manager->read($file);

        // ✅ Enforce 16:9 ratio (no crop). Small tolerance for camera rounding.
        $w = $master->width();
        $h = $master->height();
        $ratio = $w / max($h, 1);
        $target = 16 / 9;
        $tolerance = 0.02; // 2%

        if (abs($ratio - $target) > $tolerance) {
            return response()->json([
                'ok' => false,
                'message' => 'Upload must be 16:9 aspect ratio JPG.',
                'received' => "{$w}x{$h}",
            ], 422);
        }

        $cdn = Storage::disk('cdn');
        $cdnUrl = rtrim(config('filesystems.disks.cdn.url', env('CDN_URL')), '/');

        // ✅ Your fixed 16:9 sizes
        $variantsSpec = [
            [240, 135],
            [400, 225],
            [800, 450],
            [1280, 720],
            [1920, 1080],
        ];

        $variants = [];

        foreach ($variantsSpec as [$vw, $vh]) {
            $img = clone $master;

            // No crop needed since it's already 16:9.
            // scaleDown preserves aspect ratio and avoids enlarging.
            $img->scaleDown($vw, $vh);

            // If you want EXACT pixels always, uncomment cover() (rare 1px crop due to rounding)
            // $img->cover($vw, $vh, 'center');

            $encoded = $img->encode(new WebpEncoder(quality: 82));

            $path = "{$folder}/{$baseName}-{$vw}.webp";
            $cdn->put($path, (string) $encoded, ['visibility' => 'public']);

            $variants[] = [
                'width' => $vw,
                'height' => $vh,
                'format' => 'webp',
                'path' => $path,
                'url' => "{$cdnUrl}/{$path}",
            ];
        }

        // ✅ OG image (standard share image)
        $og = clone $master;
        $og->cover(1200, 630, 'center'); // OG is not 16:9; this crop is normal & expected
        $ogEncoded = $og->encode(new JpegEncoder(quality: 85));

        $ogPath = "{$folder}/{$baseName}-og-1200x630.jpg";
        $cdn->put($ogPath, (string) $ogEncoded, ['visibility' => 'public']);

        $default = collect($variants)->firstWhere('width', 800) ?? $variants[0];

        $srcset = collect($variants)
            ->map(fn ($v) => "{$v['url']} {$v['width']}w")
            ->implode(', ');

        // --- DB (optional; remove if you haven't created tables yet)
        $imageId = Gallery::create([
            'hash' => $hash,
            'folder' => $folder,
            'base_name' => $baseName,
            'default_url' => $default['url'],
            'og_url' => "{$cdnUrl}/{$ogPath}",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        foreach ($variants as $v) {
            GalleryVariant::create([
                'image_id' => $imageId,
                'width' => $v['width'],
                'height' => $v['height'],
                'format' => $v['format'],
                'url' => $v['url'],
                'path' => $v['path'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // $usageId = DB::table('image_usages')->insertGetId([
        //     'image_id'     => $imageId,
        //     'alt_text'     => $data['alt_text'],
        //     'title'        => $data['title'] ?? null,
        //     'description'  => $data['description'] ?? null,
        //     'section'      => $section,
        //     'page_slug'    => $pageSlug,
        //     'context'      => $context,
        //     'created_at'   => now(),
        //     'updated_at'   => now(),
        // ]);

        return response()->json([
            'ok' => true,
            'image_id' => $imageId,
            // 'usage_id' => $usageId,

            'default_src' => $default['url'],
            'srcset' => $srcset,
            'og_image' => "{$cdnUrl}/{$ogPath}",
            'variants' => $variants,

            'alt_text' => $data['alt_text'],
            'title' => $data['title'] ?? null,
            'description' => $data['description'] ?? null,
            'folder' => $folder,
        ]);
    }

    // public function uploadImage(Request $request)
    // {
    //     $request->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    //     ]);

    //     $image = $request->file('image');

    //     $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
    //     $safeName = Str::slug($originalName, '-');
    //     $extension = $image->getClientOriginalExtension();

    //     $year = now()->format('Y');
    //     $month = now()->format('m');
    //     $relativePath = "gallery/{$year}/{$month}";
    //     $fullPath = storage_path($relativePath);

    //     if (!File::exists($fullPath)) {
    //         File::makeDirectory($fullPath, 0755, true);
    //     }

    //     $timeString = date('His'); // e.g., 143205 for 2:32:05 PM
    //     $filename = $safeName . '-' . $timeString . '.' . $extension;
    //     $counter = 0;

    //     while (File::exists($fullPath . '/' . $filename)) {
    //         $counter++;
    //         $filename = $safeName . '-' . $timeString . '-' . $counter . '.' . $extension;
    //     }

    //     $mimeType = $image->getMimeType();
    //     $image->move($fullPath, $filename);

    //     $filepath = "{$relativePath}/{$filename}";
    //     $fileSize = File::size($fullPath . '/' . $filename); // in bytes
    //     $dimensions = @getimagesize($fullPath . '/' . $filename);
    //     $width = $dimensions[0] ?? null;
    //     $height = $dimensions[1] ?? null;
    //     $gallery = Gallery::create([
    //         'filename' => $filename,
    //         'filepath' => $filepath,
    //         'mime_type' => $mimeType,
    //         'file_size' => $fileSize,
    //         'width' => $width,
    //         'height' => $height,
    //         'alt_text' => null,
    //         'image_url' => route('image.view', ['filename' => $filename]),
    //     ]);

    //     if ($request->has('usage_type') && $request->has('usage_id')) {
    //         $usageType = $request->input('usage_type');
    //         $usageId = $request->input('usage_id');
    //         $galleryUsage = $gallery->usages()->create([
    //             "usage_type" => $usageType,
    //             "usage_id" => $usageId,
    //             "custom_attributes" =>[
    //                 "type" => "gallery"
    //             ]
    //         ]);

    //         switch ($request->usage_type) {
    //             case 'blogs':
    //                 $blog = Blog::find($request->usage_id);
    //                 $blog->cover_image = $filename;
    //                 $blog->save();
    //                 break;
    //             case 'guides':
    //                 $blog = Guide::find($request->usage_id);
    //                 $blog->photo = $filename;
    //                 $blog->save();
    //                 break;
    //             case 'featured_packages':
    //                 $data = FeaturedPackage::find($request->usage_id);
    //                 $data->banner = $filename;
    //                 $data->save();
    //                 break;
    //             default:
    //                 break;
    //         }
    //     }

    //     return response()->json([
    //         'success' => true,
    //         "filename" => $filename,
    //         'data' => $gallery,
    //         "gallery_usage" => isset($galleryUsage) ? $galleryUsage : null,
    //         'url' => route('image.view', ['filename' => $filename]),
    //     ], 201);
    // }

    public function getImage($filename)
    {
        $file = Gallery::where('filename', $filename)->first();
        if (! $file) {
            return response()->file(public_path('images/logo.png'));
        }

        $filePath = storage_path($file->filepath);

        if (! file_exists($filePath)) {
            return response()->file(public_path('images/logo.png'));
        }

        return response()->file($filePath, [
            'Content-Type' => mime_content_type($filePath),
        ]);
    }

    public function delete($imageId)
    {
        $image = GalleryUsage::find($imageId);

        if (! $image) {
            return response()->json(['message' => 'Image not found'], 404);
        }

        $image->delete();

        return response()->json(['message' => 'Image deleted successfully']);
    }
}
