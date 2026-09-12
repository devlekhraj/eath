<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JourneyPrice extends Model
{
    use SoftDeletes;

    public const PRICING_BASIS_PER_PERSON = 'per_person';
    public const PRICING_BASIS_GROUP = 'group';

    public const PRICING_BASES = [
        self::PRICING_BASIS_PER_PERSON,
        self::PRICING_BASIS_GROUP,
    ];

    public const DEFAULT_CURRENCY = 'USD';

    protected $fillable = [
        'journey_id',
        'name',
        'price_minor',
        'currency',
        'pricing_basis',
        'description',
        'min_travelers',
        'max_travelers',
        'starts_on',
        'ends_on',
        'sort_order',
        'is_primary',
        'is_active',
    ];

    protected $casts = [
        'price_minor' => 'integer',
        'starts_on' => 'date',
        'ends_on' => 'date',
        'is_primary' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function journey()
    {
        return $this->belongsTo(Journey::class);
    }
}
