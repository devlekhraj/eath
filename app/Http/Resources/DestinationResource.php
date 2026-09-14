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
            'operational_notice' => $this->operational_notice,
            'cta_title' => $this->cta_title,
            'cta_description' => $this->cta_description,
            'cta_primary_btn_text' => $this->cta_primary_btn_text,
            'cta_primary_btn_url' => $this->cta_primary_btn_url,
            'cta_secondary_btn_text' => $this->cta_secondary_btn_text,
            'cta_secondary_btn_url' => $this->cta_secondary_btn_url,
            'logistics' => $this->logistics ? $this->logistics->map(fn ($item) => [
                'id' => $item->id,
                'label' => $item->label,
                'value' => $item->value,
                'icon' => $item->icon,
                'sort_order' => $item->sort_order,
                'is_active' => (bool) $item->is_active,
            ]) : [],
            'sort_order' => $this->sort_order,
            'is_featured' => (bool) $this->is_featured,
            'is_active' => (bool) $this->is_active,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'media' => $media = $this->getGroupedMedia(),
            'hero_image' => $media['hero'] ?? null,
            'card_image' => $media['card'] ?? null,
            'gallery' => $media['gallery'] ?? [],
            'journeys_count' => $this->journeys_count ?? ($this->relationLoaded('journeys') ? $this->journeys->count() : 0),
            'treks_count' => $this->journeys_count ?? ($this->relationLoaded('journeys') ? $this->journeys->count() : 0),
            'journeys' => $this->relationLoaded('journeys') ? $this->journeys : [],
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}
