<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelPackage extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    protected $appends = ['images_urls', 'image', 'rating', 'min_price', 'highlight_name', 'fullUrl'];


    protected static function boot()
    {

        parent::boot();
        static::creating(function ($trvelPackage) {
            if (empty($trvelPackage->slug)) {
                $trvelPackage->slug = Str::slug($trvelPackage->name);
            }
        });
    }
    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'destination_id' => 'integer',
    ];
    public function featured()
    {
        return $this->hasOne(FeaturedPackage::class, 'package_id', 'id');
    }

    public function destination(){
        return $this->belongsTo(Destination::class,'destination_id','id');
    }
    public function getHighlightNameAttribute()
    {
        return $this->lookup?->name ?? '';
    }

    public function inquiries()
    {
        return $this->morphMany(Inquiry::class, 'inquirable');
    }

    public function images(): HasMany
    {
        return $this->hasMany(GalleryUsage::class, 'usage_id')
            ->where('usage_type', 'travel_packages');
    }
    public function galleries(): HasMany
    {
        return $this->hasMany(GalleryUsage::class, 'usage_id')
            ->where('usage_type', 'travel_packages')
            ->whereJsonContains('custom_attributes->type', 'gallery')
            ->with('gallery');
    }

    public function getImagesUrlsAttribute(): array
    {
        return $this->images
            ->filter(fn($usage) => $usage->gallery) // in case gallery is null
            ->map(fn($usage) => $usage->gallery->url)
            ->toArray();
    }

    // ✅ New accessor for 'image'
    public function getImageAttribute(): string
    {
        return $this->images
            ->filter(fn($usage) => $usage->gallery)
            ->first()
            ?->gallery
            ?->url ?? '/images/logo.png'; // fallback if gallery exists but URL is null
    }
    public function getRatingAttribute(): float
    {
        $ratings = [3.5, 4.0, 4.5, 5.0];
        return $ratings[array_rand($ratings)];
    }


    public function categories()
    {
        return $this->belongsToMany(
            PackageCategory::class,     // Related model
            'category_package',         // Pivot table name
            'travel_package_id',        // Foreign key on pivot table for this model
            'package_category_id'       // Foreign key on pivot table for related model
        );
    }

    public function itineraries()
    {
        return $this->hasMany(PackageItierary::class)->orderBy('sort_order', 'asc');
    }

    public function highlights()
    {
        return $this->hasMany(TravelPackageHighlight::class, 'travel_package_id', 'id')->orderBy('sort_order', 'asc');
    }


    public function inclusions()
    {
        return $this->hasMany(PackageInclusion::class)->where('is_excluded', false)->orderBy('sort_order', 'asc');
    }
    public function prices()
    {
        return $this->hasMany(PackagePrice::class, 'travel_package_id', 'id')->where('is_economy', 0)->orderBy('sort_order', 'asc');
    }
    public function priceStart()
    {
        return $this->hasOne(PackagePrice::class, 'travel_package_id', 'id')
            ->where('is_economy', 0)
            ->orderBy('price', 'asc'); // Gets the smallest price
    }

    public function allPrices()
    {
        return $this->hasMany(PackagePrice::class, 'travel_package_id', 'id')->orderBy('sort_order', 'asc');
    }
    public function economyPrice()
    {
        return $this->hasOne(PackagePrice::class, 'travel_package_id', 'id')->where('is_economy', 1);
    }

    public function getMinPriceAttribute(): ?float
    {

        return $this->prices->min('price');
    }

    public function getFullUrlAttribute(): string
    {
        $destinationSlug = $this->destination?->slug;

        if (!$destinationSlug || !$this->slug) {
            return '';
        }

        return route('trek.show', [
            'destination' => $destinationSlug,
            'slug' => $this->slug,
        ]);
    }


    public function exclusions()
    {
        return $this->hasMany(PackageInclusion::class)->where('is_excluded', true)->orderBy('sort_order', 'asc');
    }

    public function fixedDeparture()
    {
        return $this->hasOne(FeaturedPackage::class, 'package_id', 'id')
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->where('is_active', 1);
    }

    public function departures()
    {
        return $this->hasMany(TrekDeparture::class, 'trek_id', 'id')->orderBy('start_date');
    }
}
