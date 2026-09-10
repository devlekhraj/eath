<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TrekBooking extends Model
{
    protected $fillable = [
        'package_id',
        'departure_id',
        'user_id',
        'travellers',
        'total_travellers',
        'flight',
        'insurance',
        'special_requirements',
        'referral',
    ];

    protected $casts = [
        'travellers' => 'array',
    ];

    public function package()
    {
        return $this->belongsTo(TravelPackage::class, 'package_id');
    }

    public function departure()
    {
        return $this->belongsTo(TrekDeparture::class, 'departure_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
