<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'              => $this->id,
            'title'           => $this->title,
            'slug'            => $this->slug,
            'sub_title'       => $this->sub_title,
            'content'         => $this->content,
            'banner_url'     => $this->banner_url,
            'author'          => $this->author,  // can be a relationship or string depending on your model
            'is_published'    => (bool) $this->is_published,
            'published_at'    => $this->published_at,
            'is_active'       => (bool) $this->is_active,
            'meta_title'      => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keyword'    => $this->meta_keyword,
            'created_at'      => $this->created_at ? $this->created_at->toDateTimeString() : null,
            'updated_at'      => $this->updated_at ? $this->updated_at->toDateTimeString() : null,
            'deleted_at'      => $this->deleted_at ? $this->deleted_at->toDateTimeString() : null,

            'categories'        => BlogCategoryResource::collection($this->whenLoaded('categories')),
            'category_ids'        => $this->categories()->pluck('id')
        ];
    }
}
