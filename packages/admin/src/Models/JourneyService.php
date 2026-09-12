<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JourneyService extends Model
{
    use SoftDeletes;

    public const TYPE_INCLUSION = 'inclusion';
    public const TYPE_EXCLUSION = 'exclusion';

    public const TYPES = [
        self::TYPE_INCLUSION,
        self::TYPE_EXCLUSION,
    ];

    protected $fillable = [
        'journey_id',
        'type',
        'title',
        'description',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function journey()
    {
        return $this->belongsTo(Journey::class);
    }
}
