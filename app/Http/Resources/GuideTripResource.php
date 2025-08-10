<?php

// app/Http/Resources/GuideReviewResource.php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GuideTripResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'guide_id'          => $this->guide_id,
            'travel_package_id' => $this->travel_package_id,
            // Always load travel package data, fallback to null if missing
            'travel_package'    => $this->travelPackage
                ? [
                    'id' => $this->travelPackage->id,
                    'name' => $this->travelPackage->name,
                    // 'description' => $this->travelPackage->description,
                    // add other fields here
                ]
                : null,
            'start_date'        => $this->start_date,
            'end_date'          => $this->end_date,
            'group_size'        => $this->group_size,
            'notes'             => $this->notes,
            'created_at'        => $this->created_at,
        ];
    }
}
