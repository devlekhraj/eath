<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TravelPackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'slug'              => $this->slug,
            'description'       => $this->description,
            'additional_info'   => $this->additional_info,
            'duration_days'     => $this->duration_days,
            'duration_nights'   => $this->duration_nights,
            'altitude'          => $this->altitude,
            'start_date'        => $this->start_date,
            'end_date'          => $this->end_date,
            'price'             => $this->price,
            'sort_order'        => $this->sort_order,
            'is_active'         => $this->is_active,
            'is_featured'       => $this->is_featured,
            'terms_conditions'  => $this->terms_conditions,
            'cancellation_policy' => $this->cancellation_policy,
            'meta_title'        => $this->meta_title,
            'meta_description'  => $this->meta_description,
            'meta_keywords'     => $this->meta_keywords,
            'seo_image'         => $this->seo_image,
            'is_published'      => $this->is_published,
            'published_at'      => $this->published_at,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,

            // Categories relationship as nested resources or just array
            'categories'        => PackageCategoryResource::collection($this->whenLoaded('categories')),
            'category_ids'        => $this->categories()->pluck('id')
        ];
    }
}
