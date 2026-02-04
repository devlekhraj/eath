<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DestinationListResource extends JsonResource
{
    public function toArray($request)
    {
        $imageUsage = $this->images?->first();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'thumb' => $imageUsage?->gallery?->url,
            'is_active' => $this->is_active,
            'is_featured' => $this->is_featured,
        ];
    }
}
