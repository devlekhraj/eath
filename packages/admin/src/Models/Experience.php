<?php

namespace Admin\Models;

use Admin\Models\Concerns\HasFaqs;
use Admin\Models\Concerns\HasMediaAttachments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{
    use SoftDeletes, HasMediaAttachments, HasFaqs;

    protected $fillable = [
        'name',
        'slug',
        'summary',
        'description',
        'emphasis',
        'cues',
        'sort_order',
        'is_featured',
        'is_active',
        'meta_title',
        'meta_description',
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
        return $this->belongsToMany(Journey::class)->withPivot('sort_order')->withTimestamps();
    }

    public function highlights()
    {
        return $this->hasMany(ExperienceHighlight::class)->orderBy('sort_order');
    }

    public function prepQuestions()
    {
        return $this->hasMany(ExperiencePrepQuestion::class)->orderBy('sort_order');
    }
}
