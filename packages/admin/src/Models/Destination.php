<?php

namespace Admin\Models;

use Admin\Models\Concerns\HasMediaAttachments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Destination extends Model
{
    use SoftDeletes, HasMediaAttachments;

    protected $fillable = [
        'name',
        'slug',
        'summary',
        'description',
        'region_label',
        'gateway',
        'trailheads',
        'permits',
        'pacing_note',
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
        return $this->hasMany(Journey::class)->orderBy('sort_order');
    }

    public function travelerStories()
    {
        return $this->hasMany(TravelerStory::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }
}
