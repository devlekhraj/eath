<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'question',
        'answer',
        'category',
        'faqable_type',
        'faqable_id',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected $appends = [
        'journey',
        'destination',
        'experience',
    ];

    public function faqable()
    {
        return $this->morphTo();
    }

    public function getJourneyAttribute()
    {
        return ($this->faqable_type === 'journey' || $this->faqable_type === Journey::class) ? $this->faqable : null;
    }

    public function getDestinationAttribute()
    {
        return ($this->faqable_type === 'destination' || $this->faqable_type === Destination::class) ? $this->faqable : null;
    }

    public function getExperienceAttribute()
    {
        return ($this->faqable_type === 'experience' || $this->faqable_type === Experience::class) ? $this->faqable : null;
    }
}
