<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GuideResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'role' => $this->role,
            'email' => $this->email,
            'phone' => $this->phone,
            'phone_no' => $this->phone,
            'bio' => $this->biography,
            'biography' => $this->biography,
            'languages' => $this->languages ?? [],
            'language_spoken' => $this->languages ?? [],
            'qualifications' => $this->qualifications ?? [],
            'years_experience' => $this->years_experience,
            'media' => $media = $this->getGroupedMedia(),
            'avatar' => $media['avatar']['url'] ?? null,
            'avatar_image' => $media['avatar'] ?? null,
            'reviews' => $this->relationLoaded('reviews') ? $this->reviews : [],
            'trips' => $this->relationLoaded('journeys') ? $this->journeys->map(fn ($j) => [
                'id' => $j->id,
                'journey_id' => $j->id,
                'travel_package_id' => $j->id,
                'travel_package' => ['name' => $j->name, 'slug' => $j->slug],
                'journey' => ['name' => $j->name, 'slug' => $j->slug],
                'role' => $j->pivot->role ?? 'Lead Guide',
                'notes' => $j->pivot->role ?? null,
                'start_date' => null,
                'end_date' => null,
                'group_size' => null,
            ]) : [],
            'journeys' => $this->relationLoaded('journeys') ? $this->journeys : [],
            'is_active' => (bool) $this->is_active,
            'status' => $this->is_active ? 'active' : 'inactive',
            'sort_order' => $this->sort_order,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'journeys_count' => $this->journeys_count ?? 0,
            'rating_count' => $this->relationLoaded('reviews') ? $this->reviews->count() : ($this->reviews_count ?? 0),
            'trip_count' => $this->relationLoaded('journeys') ? $this->journeys->count() : ($this->journeys_count ?? 0),
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}
