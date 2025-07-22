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

    protected $appends = ['images_urls'];
    
    protected static function boot()
    {
        
        parent::boot();
        static::creating(function ($trvelPackage) {
            if (empty($trvelPackage->slug)) {
                $trvelPackage->slug = Str::slug($trvelPackage->name);
            }
        });

        static::updating(function ($trvelPackage) {
            if (empty($trvelPackage->slug) || $trvelPackage->isDirty('name')) {
                $trvelPackage->slug = Str::slug($trvelPackage->name);
            }
        });

    }
    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(GalleryUsage::class, 'usage_id')
            ->where('usage_type', 'travel_packages')
            ->with('gallery');
    }
    public function getImagesUrlsAttribute(): array
    {
        return $this->images
            ->filter(fn($usage) => $usage->gallery) // in case gallery is null
            ->map(fn($usage) => $usage->gallery->url)
            ->toArray();
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
        return $this->hasMany(PackageItierary::class);
    }

    public function exclusions()
    {
        return $this->hasMany(PackageExclusion::class);
    }

    public function inclusions()
    {
        return $this->hasMany(PackageInclusion::class);
    }
}
