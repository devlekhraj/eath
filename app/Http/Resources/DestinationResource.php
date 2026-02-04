<?php

// App\Http\Resources\PackageCategoryResource.php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class DestinationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'region' => $this->region,
            'district' => $this->district,
            'overview' => $this->overview,
            'highlights' => $this->highlights,
            'best_season' => $this->best_season,
            'how_to_reach' => $this->how_to_reach,
            'permits' => $this->permits,
            'weather_notes' => $this->weather_notes,
            'meta_title' => $this->meta_title,
            'meta_keywords' => $this->meta_keywords,
            'meta_description' => $this->meta_description,
            'canonical_url' => $this->canonical_url,
            'is_featured' => $this->is_featured,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
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
                                ? $cdnUrl . '/' . ltrim($variant->file_path, '/')
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
        ];
    }
}
