<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guide extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($guide) {
            if (empty($guide->username)) {
                $prefix = 'GUIDE';

                do {
                    // Generate a random 4-digit number as suffix
                    $suffix = rand(1000, 9999);
                    $username = $prefix . $suffix;
                } while (self::where('username', $username)->exists());

                $guide->username = $username;
            }
        });
    }

    protected $casts = [
        'language_spoken' => 'array',
    ];

    public function ratings()
    {
        return $this->hasMany(GuideReview::class, 'guide_id', 'id')->orderBy('created_at', 'desc');
    }

    public function trips()
    {
        return $this->hasMany(GuideTrip::class, 'guide_id', 'id')->orderBy('created_at', 'desc');
    }

    public function images()
    {
        return $this->hasMany(GalleryUsage::class, 'usage_id', 'id')->where('usage_type', 'guides')->with('gallery');
    }
    public function getImagesUrlsAttribute(): array
    {
        return $this->images
            ->filter(fn($usage) => $usage->gallery) // in case gallery is null
            ->map(fn($usage) => $usage->gallery->url)
            ->toArray();
    }
}
