<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelerStory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'journey_id',
        'destination_id',
        'title',
        'slug',
        'summary',
        'body',
        'traveler_name',
        'traveler_country',
        'traveled_on',
        'hero_image_id',
        'is_featured',
        'is_active',
        'is_published',
        'published_at',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'traveled_on' => 'date',
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function journey()
    {
        return $this->belongsTo(Journey::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function heroImage()
    {
        return $this->belongsTo(MediaAsset::class, 'hero_image_id');
    }
}
