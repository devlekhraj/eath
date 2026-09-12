<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'article_category_id',
        'title',
        'slug',
        'summary',
        'body',
        'author_name',
        'hero_image_id',
        'published_at',
        'updated_on',
        'is_featured',
        'is_active',
        'is_published',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'updated_on' => 'date',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'article_category_id');
    }

    public function sections()
    {
        return $this->hasMany(ArticleSection::class)->orderBy('sort_order');
    }

    public function journeys()
    {
        return $this->belongsToMany(Journey::class, 'article_journey')->withPivot('sort_order')->withTimestamps();
    }

    public function heroImage()
    {
        return $this->belongsTo(MediaAsset::class, 'hero_image_id');
    }
}
