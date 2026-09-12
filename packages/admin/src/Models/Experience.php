<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'summary',
        'description',
        'hero_image_id',
        'card_image_id',
        'sort_order',
        'is_featured',
        'is_active',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function journeys()
    {
        return $this->belongsToMany(Journey::class)->withPivot('sort_order')->withTimestamps();
    }
}
