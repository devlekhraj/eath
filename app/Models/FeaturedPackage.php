<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class FeaturedPackage extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'is_active' => 'boolean',
    ];
    protected $appends = ['banner_url'];

    public function package()
    {
        return $this->belongsTo(TravelPackage::class, 'package_id', 'id');
    }

    protected static function booted()
    {
        // Generate slug on creating
        static::creating(function ($featuredPackage) {
            if (empty($featuredPackage->slug) && !empty($featuredPackage->title)) {
                $slug = Str::slug($featuredPackage->title);
                $count = static::where('slug', 'like', "{$slug}%")->count();
                $featuredPackage->slug = $count ? "{$slug}-{$count}" : $slug;
            }
        });

        // Append "-deleted" to slug on soft deleting
        static::deleting(function ($featuredPackage) {
            $featuredPackage->slug = $featuredPackage->slug . '-deleted-' . time();
            $featuredPackage->timestamps = false;
            $featuredPackage->saveQuietly();
        });
    }

     public function getBannerUrlAttribute(): string
    {
        $galleryImage = Gallery::where('filename', $this->banner)->first();
        if (!$galleryImage) {
            return asset('images/logo.png');
        }

        $filePath = storage_path($galleryImage->filepath);
        return file_exists($filePath)
            ? route('image.view', ['filename' => $this->banner])
            : asset('images/logo.png');
    }


    public function inquiries()
    {
        return $this->morphMany(Inquiry::class, 'inquirable');
    }
}
