<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DestinationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'summary' => $this->summary,
            'description' => $this->description,
            'region_label' => $this->region_label,
            'region' => $this->region_label,
            'gateway' => $this->gateway,
            'trailheads' => $this->trailheads,
            'permits' => $this->permits,
            'pacing_note' => $this->pacing_note,
            'sort_order' => $this->sort_order,
            'is_featured' => (bool) $this->is_featured,
            'is_active' => (bool) $this->is_active,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'hero_image_id' => $this->hero_image_id,
            'card_image_id' => $this->card_image_id,
            'journeys_count' => $this->journeys_count ?? ($this->relationLoaded('journeys') ? $this->journeys->count() : 0),
            'treks_count' => $this->journeys_count ?? ($this->relationLoaded('journeys') ? $this->journeys->count() : 0),
            'journeys' => $this->relationLoaded('journeys') ? $this->journeys : [],
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}
