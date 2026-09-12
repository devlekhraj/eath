<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JourneyDeparture extends Model
{
    use SoftDeletes;

    public const STATUS_OPEN = 'open';
    public const STATUS_LIMITED = 'limited';
    public const STATUS_FULL = 'full';
    public const STATUS_CLOSED = 'closed';
    public const STATUS_CANCELLED = 'cancelled';

    public const STATUSES = [
        self::STATUS_OPEN,
        self::STATUS_LIMITED,
        self::STATUS_FULL,
        self::STATUS_CLOSED,
        self::STATUS_CANCELLED,
    ];

    protected $fillable = [
        'journey_id',
        'code',
        'start_date',
        'end_date',
        'status',
        'total_seats',
        'available_seats',
        'price_minor',
        'currency',
        'booking_deadline',
        'notes',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'booking_deadline' => 'date',
        'total_seats' => 'integer',
        'available_seats' => 'integer',
        'price_minor' => 'integer',
        'is_active' => 'boolean',
    ];

    public function journey()
    {
        return $this->belongsTo(Journey::class);
    }

    public function plannerSubmissions()
    {
        return $this->hasMany(PlannerSubmission::class, 'departure_id');
    }

    public function bookings()
    {
        return $this->plannerSubmissions();
    }
}
