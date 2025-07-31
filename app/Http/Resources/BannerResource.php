<?php

// App\Http\Resources\PackageCategoryResource.php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'              => $this->id,
            'name'            => $this->name,
            'slug'        => $this->slug,
            'description'          => $this->description,
            'aspect_ratio'        => $this->aspect_ratio,
            'is_active'           => $this->is_active,
            'sort_order'  => $this->sort_order,
            'images'            => $this->images->map(function ($image) {
                return [
                    'id' => $image->id,
                    'url' => $image->url,
                ];
            }),
            'created_at'      => $this->created_at,
            'updated_at'      => $this->updated_at,
        ];
    }
}
