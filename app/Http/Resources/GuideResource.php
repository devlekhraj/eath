<?php

// App\Http\Resources\PackageCategoryResource.php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GuideResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'              => $this->id,
            'avatar'          => $this->avatar,
            'name'            => $this->name,
            'username'        => $this->username,
            'bio'             => $this->bio,
            'phone_no'        => $this->phone_no,
            'email'           => $this->email,
            'license_number'  => $this->license_number,
            'language_spoken' => $this->language_spoken,
            'rating_count'    => $this->ratings()->count(),
            'trip_count'      => $this->trips()->count(),
            'status'          => $this->status,
            'created_at'      => $this->created_at,
            'updated_at'      => $this->updated_at,
        ];
    }
}
