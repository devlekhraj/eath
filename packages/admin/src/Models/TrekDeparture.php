<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TrekDeparture extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'trek_id',
        'start_date',
        'end_date',
        'available_seats',
        'cost',
        'seq_no',
        'status',
        'meta',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'meta' => 'array',
    ];

    public function trek()
    {
        return $this->belongsTo(TravelPackage::class, 'trek_id', 'id');
    }

    public function bookings()
    {
        return $this->hasMany(TrekBooking::class, 'departure_id');
    }
}
