<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Inquiry extends Model
{
    use SoftDeletes;

    // Inquiry Types
    public const TYPE_GENERAL = 'general';
    public const TYPE_JOURNEY = 'journey';
    public const TYPE_DEPARTURE = 'departure';
    public const TYPE_CUSTOM = 'custom';

    public const TYPES = [
        self::TYPE_GENERAL,
        self::TYPE_JOURNEY,
        self::TYPE_DEPARTURE,
        self::TYPE_CUSTOM,
    ];

    // Statuses
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
        'inquiry_type',
        'journey_id',
        'departure_id',
        'name',
        'email',
        'phone',
        'country',
        'subject',
        'message',
        'status',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'journey_id' => 'integer',
        'departure_id' => 'integer',
    ];

    public function journey()
    {
        return $this->belongsTo(Journey::class);
    }

    public function departure()
    {
        return $this->belongsTo(JourneyDeparture::class);
    }
}
