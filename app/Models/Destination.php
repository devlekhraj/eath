<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
    protected $guarded = [];

    protected $casts = [
        "is_active" => "boolean",
        "is_featured" => "boolean"
    ];

     protected $appends = ['image'];

    protected static function booted()
    {
        static::creating(function ($destination) {
            if (empty($destination->slug) && ! empty($destination->name)) {
                $slug = Str::slug($destination->name);
                $originalSlug = $slug;
                $count = 1;

                while (static::where('slug', $slug)->exists()) {
                    $slug = "{$originalSlug}-{$count}";
                    $count++;
                }

                $destination->slug = $slug;
            }
        });
    }

    public function images(): HasMany
    {
        return $this->hasMany(GalleryUsage::class, 'usage_id')
            ->where('usage_type', $this->getTable())
            ->with('gallery')
            ->orderBy('created_at', 'desc');
    }


    public function treks(){
        return $this->hasMany(TravelPackage::class,'destination_id')->where('is_active',1);
    }
    public function galleries(): HasMany
    {
        return $this->hasMany(GalleryUsage::class, 'usage_id')
            ->where('usage_type', $this->getTable())
            ->whereJsonContains('custom_attributes->type', 'gallery')
            ->with('gallery');
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
}
