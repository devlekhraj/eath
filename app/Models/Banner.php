<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Banner extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function booted()
    {
        static::creating(function ($banner) {
            if (empty($banner->slug)) {
                $baseSlug = Str::slug($banner->name);
                $slug = $baseSlug;
                $count = 1;

                // Ensure uniqueness
                while (self::where('slug', $slug)->withTrashed()->exists()) {
                    $slug = $baseSlug . '-' . $count++;
                }

                $banner->slug = $slug;
            }
        });
    }

    public function images(): HasMany
    {
        return $this->hasMany(GalleryUsage::class, 'usage_id')
            ->where('usage_type', 'banners')
            ->with('gallery');
    }
    public function getImagesUrlsAttribute(): array
    {
        return $this->images
            ->filter(fn($usage) => $usage->gallery) // in case gallery is null
            ->map(fn($usage) => $usage->gallery->url)
            ->toArray();
    }
}
