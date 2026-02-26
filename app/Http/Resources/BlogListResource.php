<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $category = $this->relationLoaded('category') ? $this->category : null;
        if (!$category && $this->relationLoaded('categories') && $this->categories->isNotEmpty()) {
            $category = $this->categories->first();
        }

        $categorySlug = $category ? $category->slug : null;

        return [
            'id' => $this->id,
            'title' => $this->title,
            'banner_url' => $this->banner_url,
            'category' => $category ? [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug,
            ] : null,
            'status' => (bool) $this->is_active,
            'blog_url' => $this->slug
                ? (($categorySlug)
                    ? route('blog.detail', [
                        'category_slug' => $categorySlug,
                        'blog_slug' => $this->slug,
                    ])
                    : route('blog.show', ['slug' => $this->slug]))
                : null,
        ];
    }
}
