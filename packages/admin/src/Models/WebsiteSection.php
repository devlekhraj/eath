<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WebsiteSection extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'page_key',
        'section_key',
        'heading',
        'eyebrow',
        'body',
        'content',
        'media_asset_id',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'content' => 'array',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function mediaAsset()
    {
        return $this->belongsTo(MediaAsset::class);
    }
}
