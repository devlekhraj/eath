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

            "highlights" => $this->highlights->map(function ($highlight) {
                return [
                    'id' => $highlight->id,
                    'description' => $highlight->description,
                    'sort_order' => $highlight->sort_order,
                    'highlight_name' => $highlight->highlight_name,
                    'icon_url' => $highlight->icon_url,
                    'travel_package_id' => $highlight->travel_package_id,
                ];
            }),
            // Categories relationship as nested resources or just array
            'categories'        => PackageCategoryResource::collection($this->whenLoaded('categories')),
            'category_ids'        => $this->categories()->pluck('id'),
            'images'            => $this->images->map(function ($image) {
                return [
                    'id' => $image->id,
                    'url' => $image->url,
                ];
            }),
            'galleries'            => $this->galleries->map(function ($image) {
                return [
                    'id' => $image->id,
                    'url' => $image->url,
                ];
            }),
            
            'itineraries'            => $this->itineraries->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'description' => $item->description,
                    'sort_order' => $item->sort_order,
                    "highlights" => $item->highlights->map(function ($highlight) {
                        return [
                            'id' => $highlight->id,
                            'description' => $highlight->description,
                            'sort_order' => $highlight->sort_order,
                            'itinerary_lookup_id' => $highlight->itinerary_lookup_id,
                            'highlight_name' => $highlight->highlight_name,
                            'icon_url' => $highlight->icon_url,
                            'itinerary_id' => $highlight->itinerary_id,
                        ];
                    })

                ];
            }),
            'inclusions'            => $this->inclusions->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'description' => $item->description,
                    'sort_order' => $item->sort_order,
                    "is_excluded" => $item->is_excluded,
                    "travel_package_id" => $item->travel_package_id,
                ];
            }),
            'prices'            => $this->allPrices->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'price' => $item->price,
                    'sort_order' => $item->sort_order,
                    "travel_package_id" => $item->travel_package_id,
                    "is_default" => $item->is_default,
                    "is_economy" => $item->is_economy,
                    "is_active" => $item->is_active,
                    "description" => $item->description,
                ];
            }),
            'economy_price' => $this->economyPrice,

            'exclusions'            => $this->exclusions->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'description' => $item->description,
                    'sort_order' => $item->sort_order,
                    "is_excluded" => $item->is_excluded,
                    "travel_package_id" => $item->travel_package_id,
                ];
            }),
            'category_ids'        => $this->categories()->pluck('id')
        ];
    }
}
