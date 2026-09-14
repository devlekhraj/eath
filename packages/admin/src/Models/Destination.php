<?php

namespace Admin\Models;

use Admin\Models\Concerns\HasFaqs;
use Admin\Models\Concerns\HasMediaAttachments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Destination extends Model
{
    use SoftDeletes, HasMediaAttachments, HasFaqs;

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
        'operational_notice',
        'cta_title',
        'cta_description',
        'cta_primary_btn_text',
        'cta_primary_btn_url',
        'cta_secondary_btn_text',
        'cta_secondary_btn_url',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function journeys()
    {
        return $this->hasMany(Journey::class)->orderBy('sort_order');
    }

    public function logistics()
    {
        return $this->hasMany(DestinationLogistics::class)->orderBy('sort_order');
    }

    public function travelerStories()
    {
        return $this->hasMany(TravelerStory::class);
    }
}
