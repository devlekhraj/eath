<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JourneyItineraryHighlight extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'journey_itinerary_day_id',
        'title',
        'description',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public function itineraryDay()
    {
        return $this->belongsTo(JourneyItineraryDay::class, 'journey_itinerary_day_id');
    }
}
