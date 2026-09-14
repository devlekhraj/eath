<?php

namespace Admin\Models;

use Admin\Models\Concerns\HasFaqs;
use Admin\Models\Concerns\HasMediaAttachments;
use Illuminate\Database\Eloquent\Model;

class TravelMonth extends Model
{
    use HasFaqs;
    use HasMediaAttachments;

    public const SEASON_WINTER = 'winter';
    public const SEASON_SPRING = 'spring';
    public const SEASON_SUMMER = 'summer';
    public const SEASON_AUTUMN = 'autumn';

    public const SEASONS = [
        self::SEASON_WINTER,
        self::SEASON_SPRING,
        self::SEASON_SUMMER,
        self::SEASON_AUTUMN,
    ];

    protected $fillable = [
        'month_number',
        'name',
        'slug',
        'season',
        'summary',
        'description',
        'conditions_note',
        'content',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'month_number' => 'integer',
        'is_active' => 'boolean',
        'content' => 'array',
    ];

    public function journeys()
    {
        return $this->belongsToMany(Journey::class, 'journey_month')
            ->withPivot(['suitability', 'note', 'sort_order'])
            ->withTimestamps();
    }
}
