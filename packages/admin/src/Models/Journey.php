<?php

namespace Admin\Models;

use Admin\Models\Concerns\HasFaqs;
use Admin\Models\Concerns\HasMediaAttachments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Journey extends Model
{
    use SoftDeletes, HasMediaAttachments, HasFaqs;

    // Difficulty
    public const DIFFICULTY_EASY = 'easy';
    public const DIFFICULTY_MODERATE = 'moderate';
    public const DIFFICULTY_CHALLENGING = 'challenging';
    public const DIFFICULTY_STRENUOUS = 'strenuous';

    public const DIFFICULTIES = [
        self::DIFFICULTY_EASY,
        self::DIFFICULTY_MODERATE,
        self::DIFFICULTY_CHALLENGING,
        self::DIFFICULTY_STRENUOUS,
    ];

    // Accommodation Style
    public const ACCOMMODATION_STANDARD = 'standard';
    public const ACCOMMODATION_COMFORT = 'comfort';
    public const ACCOMMODATION_LUXURY = 'luxury';
    public const ACCOMMODATION_MIXED = 'mixed';

    public const ACCOMMODATION_STYLES = [
        self::ACCOMMODATION_STANDARD,
        self::ACCOMMODATION_COMFORT,
        self::ACCOMMODATION_LUXURY,
        self::ACCOMMODATION_MIXED,
    ];

    // Pace
    public const PACE_RELAXED = 'relaxed';
    public const PACE_BALANCED = 'balanced';
    public const PACE_ACTIVE = 'active';
    public const PACE_INTENSE = 'intense';

    public const PACES = [
        self::PACE_RELAXED,
        self::PACE_BALANCED,
        self::PACE_ACTIVE,
        self::PACE_INTENSE,
    ];

    // Pricing Basis
    public const PRICING_BASIS_PER_PERSON = 'per_person';
    public const PRICING_BASIS_GROUP = 'group';

    public const PRICING_BASES = [
        self::PRICING_BASIS_PER_PERSON,
        self::PRICING_BASIS_GROUP,
    ];

    // Travel Month Pivot Suitability (journey_month)
    public const SUITABILITY_IDEAL = 'ideal';
    public const SUITABILITY_GOOD = 'good';
    public const SUITABILITY_POSSIBLE = 'possible';
    public const SUITABILITY_NOT_RECOMMENDED = 'not_recommended';

    public const SUITABILITIES = [
        self::SUITABILITY_IDEAL,
        self::SUITABILITY_GOOD,
        self::SUITABILITY_POSSIBLE,
        self::SUITABILITY_NOT_RECOMMENDED,
    ];

    protected $fillable = [
        'destination_id',
        'guide_id',
        'name',
        'slug',
        'subtitle',
        'summary',
        'description',
        'overview_secondary',
        'duration_days',
        'duration_nights',
        'difficulty',
        'max_altitude_m',
        'walking_hours_min',
        'walking_hours_max',
        'accommodation_style',
        'pace',
        'price_minor',
        'currency',
        'pricing_basis',
        'featured_rank',
        'is_featured',
        'is_active',
        'is_published',
        'published_at',
        'accommodation_note',
        'logistics_note',
        'safety_note',
        'route_map_note',
        'preparation_note',
        'packing_note',
        'operational_notice',
        'cta_title',
        'cta_description',
        'cta_primary_btn_text',
        'cta_primary_btn_url',
        'cta_secondary_btn_text',
        'cta_secondary_btn_url',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'duration_days' => 'integer',
        'duration_nights' => 'integer',
        'max_altitude_m' => 'integer',
        'walking_hours_min' => 'integer',
        'walking_hours_max' => 'integer',
        'price_minor' => 'integer',
        'featured_rank' => 'integer',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected $appends = [
        'title',
    ];

    public function getTitleAttribute(): ?string
    {
        return $this->attributes['name'] ?? null;
    }

    public function setTitleAttribute(?string $value): void
    {
        $this->attributes['name'] = $value;
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }

    public function experiences()
    {
        return $this->belongsToMany(Experience::class)->withPivot('sort_order')->withTimestamps();
    }

    public function travelMonths()
    {
        return $this->belongsToMany(TravelMonth::class, 'journey_month')
            ->withPivot(['suitability', 'note', 'sort_order'])
            ->withTimestamps();
    }

    public function itineraryDays()
    {
        return $this->hasMany(JourneyItineraryDay::class)->orderBy('day_number');
    }

    public function highlights()
    {
        return $this->hasMany(JourneyHighlight::class)->orderBy('sort_order');
    }

    public function services()
    {
        return $this->hasMany(JourneyService::class)->orderBy('sort_order');
    }

    public function prices()
    {
        return $this->hasMany(JourneyPrice::class)->orderBy('sort_order');
    }

    public function departures()
    {
        return $this->hasMany(JourneyDeparture::class)->orderBy('start_date');
    }

    public function guides()
    {
        return $this->belongsToMany(Guide::class)->withPivot(['role', 'sort_order'])->withTimestamps();
    }

    public function safetyItems()
    {
        return $this->hasMany(JourneySafetyItem::class)->orderBy('sort_order');
    }
}
