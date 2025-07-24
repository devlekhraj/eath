<?php

// App\Http\Resources\PackageCategoryResource.php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogCategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'slug'           => $this->slug,
            'description'    => $this->description,
            'parent_id'      => $this->parent_id,
            'is_active'      => $this->is_active,
            'created_at'     => $this->created_at,
            'updated_at'     => $this->updated_at,
            'sort_order'     => $this->sort_order,
            'children'       => BlogCategoryResource::collection($this->whenLoaded('children')),
            'hierarchy_text' => $this->generateHierarchyText(),
        ];
    }

    private function generateHierarchyText()
    {
        $names = [];
        $current = $this;

        while ($current) {
            $names[] = $current->name;
            $current = $current->parent;
        }

        return implode(' > ', array_reverse($names));
    }
}
