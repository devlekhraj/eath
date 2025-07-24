<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    use SoftDeletes;

    protected $table = 'blogs';
    protected $appends = ['banner_url'];

    protected $fillable = [
        'title',
        'slug',
        'sub_title',
        'content',
        'cover_image',
        'author',
        'is_published',
        'published_at', // <-- Make this match the cast
        'is_active',
        'meta_title',
        'meta_description',
        'meta_keyword',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_active' => 'boolean',
        'published_at' => 'datetime', // must match fillable
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function getBannerUrlAttribute(): string
    {
        $galleryImage = Gallery::where('filename', $this->cover_image)->first();
        if (!$galleryImage) {
            return asset('images/logo.png');
        }

        $filePath = storage_path($galleryImage->filepath);
        return file_exists($filePath)
            ? route('image.view', ['filename' => $this->cover_image])
            : asset('images/logo.png');
    }


    public function images(): HasMany
    {
        return $this->hasMany(GalleryUsage::class, 'usage_id')
            ->where('usage_type', 'blogs')
            ->with('gallery');
    }

    public function categories()
    {
        return $this->belongsToMany(
            BlogCategory::class,
            'category_blog',
            'blog_id',
            'blog_category_id'
        )->withTimestamps();  // <-- this enables automatic update of timestamps on pivot
    }
}
