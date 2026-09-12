<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebsiteComparisonItem extends Model
{
    protected $fillable = [
        'visitor_key',
        'journey_id',
        'position',
        'ip_address',
        'user_agent',
        'referer_url',
        'accept_language',
        'request_time',
        'request_timezone',
        'server_timezone',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'journey_id' => 'integer',
        'position' => 'integer',
        'request_time' => 'datetime',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    public function journey(): BelongsTo
    {
        return $this->belongsTo(Journey::class);
    }

    public function scopeForVisitor(Builder $query, string $visitorKey): Builder
    {
        return $query->where('visitor_key', $visitorKey);
    }
}
