<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Storage;
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
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'full_url' => $this->fullUrl,
            'description' => $this->description,
            'additional_info' => $this->additional_info,
            'duration_days' => $this->duration_days,
            'duration_nights' => $this->duration_nights,
            'altitude' => $this->altitude,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'price' => $this->price,
            'sort_order' => $this->sort_order,
            'is_active' => $this->is_active,
            'is_featured' => $this->is_featured,
            'terms_conditions' => $this->terms_conditions,
            'cancellation_policy' => $this->cancellation_policy,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'seo_image' => $this->seo_image,
            'seo_image' => $this->seo_image,
            'destination_id' => $this->destination_id,
            'destination' => $this->whenLoaded('destination', function () {
                return [
                    'id' => $this->destination->id,
                    'name' => $this->destination->name,
                    'slug' => $this->destination->slug,
                ];
            }),
            'published_at' => $this->published_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'highlights' => $this->highlights->map(function ($highlight) {
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
            'galleries' => $this->galleries->map(function ($image) {
                return [
                    'id' => $image->id,
                    'url' => $image->url,
                ];
            }),

            'itineraries' => $this->itineraries->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'description' => $item->description,
                    'sort_order' => $item->sort_order,
                    'highlights' => $item->highlights->map(function ($highlight) {
                        return [
                            'id' => $highlight->id,
                            'description' => $highlight->description,
                            'sort_order' => $highlight->sort_order,
                            'itinerary_lookup_id' => $highlight->itinerary_lookup_id,
                            'highlight_name' => $highlight->highlight_name,
                            'icon_url' => $highlight->icon_url,
                            'itinerary_id' => $highlight->itinerary_id,
                        ];
                    }),

                ];
            }),
            'inclusions' => $this->inclusions->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'description' => $item->description,
                    'sort_order' => $item->sort_order,
                    'is_excluded' => $item->is_excluded,
                    'travel_package_id' => $item->travel_package_id,
                ];
            }),
            'prices' => $this->allPrices->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'price' => $item->price,
                    'sort_order' => $item->sort_order,
                    'travel_package_id' => $item->travel_package_id,
                    'is_default' => $item->is_default,
                    'is_economy' => $item->is_economy,
                    'is_active' => $item->is_active,
                    'description' => $item->description,
                ];
            }),
            'economy_price' => $this->economyPrice,

            'exclusions' => $this->exclusions->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'description' => $item->description,
                    'sort_order' => $item->sort_order,
                    'is_excluded' => $item->is_excluded,
                    'travel_package_id' => $item->travel_package_id,
                ];
            }),
        'departures' => $this->whenLoaded('departures', function () {
            return $this->departures->map(function ($dep) {
                return [
                    'id' => $dep->id,
                    'start_date' => optional($dep->start_date)->toDateString(),
                    'end_date' => optional($dep->end_date)->toDateString(),
                    'available_seats' => $dep->available_seats,
                    'cost' => $dep->cost,
                    'status' => $dep->status,
                    'seq_no' => $dep->seq_no,
                    'booking_count' => $dep->relationLoaded('bookings') ? $dep->bookings->count() : null,
                    'bookings' => $dep->relationLoaded('bookings') ? $dep->bookings->map(function ($booking) {
                        $user = $booking->relationLoaded('user') ? $booking->user : null;
                        return [
                            'id' => $booking->id,
                            'package_id' => $booking->package_id,
                            'departure_id' => $booking->departure_id,
                            'total_travellers' => $booking->total_travellers,
                            'travellers' => $booking->travellers,
                            'flight' => $booking->flight,
                            'insurance' => $booking->insurance,
                            'special_requirements' => $booking->special_requirements,
                            'referral' => $booking->referral,
                            'user' => $user ? [
                                'id' => $user->id,
                                'name' => trim(($user->fname ?? '') . ' ' . ($user->lname ?? '')) ?: null,
                                'email' => $user->email,
                                'phone' => $user->mobile_no,
                            ] : null,
                            'created_at' => optional($booking->created_at)->toDateTimeString(),
                        ];
                    }) : null,
                ];
            });
        }),
            // 'category_ids'        => $this->categories()->pluck('id')
        ];
    }
}
