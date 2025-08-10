<?php

// app/Http/Resources/GuideReviewResource.php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GuideReviewResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'guide_id' => $this->guide_id,
            'rating' => $this->rating,
            'comment' => $this->comment,
            'is_approved' => $this->is_approved,
            'reviewer' => [
                'type' => class_basename($this->reviewer_type),
                'id' => $this->reviewer_id,
                'name' => $this->reviewer?->name ?? null,  // assuming reviewer has a 'name'
                // add more fields if needed
            ],
            'created_at' => $this->created_at,
        ];
    }
}
