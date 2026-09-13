<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DestinationListResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'summary' => $this->summary,
            'region_label' => $this->region_label,
            'region' => $this->region_label,
            'gateway' => $this->gateway,
            'trailheads' => $this->trailheads,
            'permits' => $this->permits,
            'pacing_note' => $this->pacing_note,
            'sort_order' => $this->sort_order,
            'thumb' => $this->heroAttachment?->mediaAsset?->url ?? $this->cardAttachment?->mediaAsset?->url ?? null,
            'image_count' => ($this->heroAttachment ? 1 : 0) + ($this->cardAttachment ? 1 : 0),
            'journeys_count' => $this->journeys_count ?? 0,
            'treks_count' => $this->journeys_count ?? 0,
            'is_active' => (bool) $this->is_active,
            'is_featured' => (bool) $this->is_featured,
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}
