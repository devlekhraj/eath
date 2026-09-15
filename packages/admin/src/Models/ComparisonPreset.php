<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComparisonPreset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'trek_ids',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'trek_ids' => 'array',
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];

    public function journeys()
    {
        $slugs = $this->trek_ids ?? [];

        return Journey::query()
            ->whereIn('slug', $slugs)
            ->where('is_active', true)
            ->where('is_published', true)
            ->get();
    }
}
