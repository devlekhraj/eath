<?php

namespace Admin\Models;

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

    protected $appends = ['avatar'];
    protected $casts = [
        'language_spoken' => 'array',
    ];

    public function reviews()
    {
        return $this->hasMany(GuideReview::class, 'guide_id', 'id')->orderBy('created_at', 'desc');
    }

    public function trips()
    {
        return $this->hasMany(GuideTrip::class, 'guide_id', 'id')->orderBy('created_at', 'desc');
    }

    public function image()
    {
        return $this->hasOne(GalleryUsage::class, 'usage_id', 'id')->where('usage_type', 'guides')->with('gallery');
    }

    public function getAvatarAttribute(): string
    {
        $photo = Gallery::where('filename', $this->photo)->first();
        if (!$photo) {
            return asset('images/logo.png');
        }

        $filePath = storage_path($photo->filepath);
        return file_exists($filePath)
            ? route('image.view', ['filename' => $this->photo])
            : asset('images/logo.png');
    }
}
