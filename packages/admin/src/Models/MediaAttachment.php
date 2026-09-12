<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

class MediaAttachment extends Model
{
    public const COLLECTION_DEFAULT = 'default';
    public const COLLECTION_GALLERY = 'gallery';
    public const COLLECTION_HERO = 'hero';
    public const COLLECTION_CARD = 'card';
    public const COLLECTION_AVATAR = 'avatar';
    public const COLLECTION_BANNER = 'banner';
    public const COLLECTION_ROUTE_MAP = 'route_map';

    public const COLLECTIONS = [
        self::COLLECTION_DEFAULT,
        self::COLLECTION_GALLERY,
        self::COLLECTION_HERO,
        self::COLLECTION_CARD,
        self::COLLECTION_AVATAR,
        self::COLLECTION_BANNER,
        self::COLLECTION_ROUTE_MAP,
    ];

    protected $fillable = [
        'media_asset_id',
        'attachable_type',
        'attachable_id',
        'collection',
        'title',
        'alt_text',
        'caption',
        'custom_attributes',
        'sort_order',
    ];

    protected $casts = [
        'custom_attributes' => 'array',
        'sort_order' => 'integer',
    ];

    public function mediaAsset()
    {
        return $this->belongsTo(MediaAsset::class);
    }

    public function attachable()
    {
        return $this->morphTo();
    }
}
