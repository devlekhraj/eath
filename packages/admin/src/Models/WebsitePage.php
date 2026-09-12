<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WebsitePage extends Model
{
    use SoftDeletes;

    public const TYPE_STANDARD = 'standard';
    public const TYPE_POLICY = 'policy';
    public const TYPE_SAFETY = 'safety';
    public const TYPE_RESPONSIBLE = 'responsible';
    public const TYPE_ABOUT = 'about';
    public const TYPE_CONTACT = 'contact';

    public const TYPES = [
        self::TYPE_STANDARD,
        self::TYPE_POLICY,
        self::TYPE_SAFETY,
        self::TYPE_RESPONSIBLE,
        self::TYPE_ABOUT,
        self::TYPE_CONTACT,
    ];

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'body',
        'type',
        'hero_image_id',
        'is_active',
        'is_published',
        'published_at',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function sections()
    {
        return $this->hasMany(WebsitePageSection::class)->orderBy('sort_order');
    }

    public function heroImage()
    {
        return $this->belongsTo(MediaAsset::class, 'hero_image_id');
    }
}
