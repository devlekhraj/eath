<?php

// App\Http\Resources\PackageCategoryResource.php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'aspect_ratio' => $this->aspect_ratio,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
            'images' => $this->whenLoaded('images', function () {
                return $this->images->map(function ($usage) {
                    $cdnUrl = rtrim(config('filesystems.disks.cdn.url', env('CDN_URL')), '/');

                    return [
                        'id' => $usage->id,
                        'url' => $usage->gallery->url,
                        'alt_text' => $usage->alt_text,
                        'caption' => $usage->caption,
                        'description' => $usage->description,
                        'height' => $usage->gallery->height,
                        'width' => $usage->gallery->width,
                        'size' => $usage->gallery->size,
                        'variants' => $usage->gallery->variants->map(function ($variant) use ($cdnUrl) {
                            $url = $cdnUrl !== ''
                                ? $cdnUrl.'/'.ltrim($variant->file_path, '/')
                                : Storage::disk('cdn')->url($variant->file_path);

                            return [
                                // 'variant' => $variant->variant,
                                // 'format' => $variant->format,
                                'url' => $url,
                                // 'file_path' => $variant->file_path,
                                // 'size' => $variant->size,
                                'width' => $variant->width,
                                'height' => $variant->height,
                            ];
                        }),
                    ];
                });
            }),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
