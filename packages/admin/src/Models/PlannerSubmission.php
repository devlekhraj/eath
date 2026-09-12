<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlannerSubmission extends Model
{
    use SoftDeletes;

    public const STATUS_NEW = 'new';
    public const STATUS_REVIEWING = 'reviewing';
    public const STATUS_REPLIED = 'replied';
    public const STATUS_CLOSED = 'closed';

    public const STATUSES = [
        self::STATUS_NEW,
        self::STATUS_REVIEWING,
        self::STATUS_REPLIED,
        self::STATUS_CLOSED,
    ];

    protected $fillable = [
        'reference_code',
        'journey_id',
        'departure_id',
        'destination_id',
        'experience_id',
        'travel_month_id',
        'contact_name',
        'contact_email',
        'contact_phone',
        'country',
        'adults',
        'children',
        'available_days',
        'budget_minor',
        'currency',
        'preferences',
        'recommendation_snapshot',
        'message',
        'status',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'preferences' => 'array',
        'recommendation_snapshot' => 'array',
        'adults' => 'integer',
        'children' => 'integer',
        'available_days' => 'integer',
        'budget_minor' => 'integer',
    ];

    public function journey()
    {
        return $this->belongsTo(Journey::class);
    }

    public function departure()
    {
        return $this->belongsTo(JourneyDeparture::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }

    public function travelMonth()
    {
        return $this->belongsTo(TravelMonth::class);
    }
}
