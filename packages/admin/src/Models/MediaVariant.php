<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

class MediaVariant extends Model
{
    // Presets
    public const VARIANT_THUMB = 'thumb';
    public const VARIANT_MEDIUM = 'medium';
    public const VARIANT_LARGE = 'large';
    public const VARIANT_OG = 'og';
    public const VARIANT_HERO = 'hero';

    public const VARIANTS = [
        self::VARIANT_THUMB,
        self::VARIANT_MEDIUM,
        self::VARIANT_LARGE,
        self::VARIANT_OG,
        self::VARIANT_HERO,
    ];

    // Formats
    public const FORMAT_WEBP = 'webp';
    public const FORMAT_AVIF = 'avif';
    public const FORMAT_JPG = 'jpg';
    public const FORMAT_PNG = 'png';

    public const FORMATS = [
        self::FORMAT_WEBP,
        self::FORMAT_AVIF,
        self::FORMAT_JPG,
        self::FORMAT_PNG,
    ];

    protected $fillable = [
        'media_asset_id',
        'variant',
        'format',
        'file_name',
        'file_path',
        'mime_type',
        'size',
        'disk',
        'width',
        'height',
    ];

    protected $casts = [
        'size' => 'integer',
        'width' => 'integer',
        'height' => 'integer',
    ];

    public function mediaAsset()
    {
        return $this->belongsTo(MediaAsset::class);
    }
}
