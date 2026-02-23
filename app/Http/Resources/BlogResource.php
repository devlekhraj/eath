<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class BlogResource extends JsonResource
{
    public function toArray($request)
    {
        $categorySlug = null;
        if ($this->relationLoaded('category') && $this->category) {
            $categorySlug = $this->category->slug;
        } elseif ($this->relationLoaded('categories') && $this->categories->isNotEmpty()) {
            $categorySlug = optional($this->categories->first())->slug;
        } elseif ($this->category) {
            $categorySlug = $this->category->slug;
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'blog_url' => ($categorySlug && $this->slug)
                ? route('blog.detail', [
                    'category_slug' => $categorySlug,
                    'blog_slug' => $this->slug,
                ])
                : route('blog.show', ['slug' => $this->slug]),
            'sub_title' => $this->sub_title,
            'content' => $this->content,
            'banner_url' => $this->banner_url,
            'author' => $this->author,  // can be a relationship or string depending on your model
            'is_published' => (bool) $this->is_published,
            'published_at' => $this->published_at,
            'is_active' => (bool) $this->is_active,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keyword' => $this->meta_keyword,
            'created_at' => $this->created_at ? $this->created_at->toDateTimeString() : null,
            'updated_at' => $this->updated_at ? $this->updated_at->toDateTimeString() : null,
            'deleted_at' => $this->deleted_at ? $this->deleted_at->toDateTimeString() : null,
            'category' => $this->whenLoaded('category', function () {
                if (! $this->category) {
                    return null;
                }

                return [
                    'id' => $this->category->id,
                    'name' => $this->category->name,
                    'slug' => $this->category->slug,
                ];
            }),
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
                                'url' => $url,
                                'width' => $variant->width,
                                'height' => $variant->height,
                            ];
                        }),
                    ];
                });
            }),

            'categories' => BlogCategoryResource::collection($this->whenLoaded('categories')),
            'category_ids' => $this->whenLoaded('categories', function () {
                return $this->categories->pluck('id');
            }, []),
        ];
    }
}
