<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JourneyItineraryDay extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'journey_id',
        'day_number',
        'title',
        'route',
        'description',
        'location_label',
        'altitude_m',
        'altitude_label',
        'walking_hours',
        'walking_hours_label',
        'accommodation_label',
        'meal_note',
        'is_acclimatization',
        'sort_order',
    ];

    protected $casts = [
        'day_number' => 'integer',
        'altitude_m' => 'integer',
        'walking_hours' => 'decimal:1',
        'is_acclimatization' => 'boolean',
    ];

    public function journey()
    {
        return $this->belongsTo(Journey::class);
    }

    public function highlights()
    {
        return $this->hasMany(JourneyItineraryHighlight::class)->orderBy('sort_order');
    }
}
