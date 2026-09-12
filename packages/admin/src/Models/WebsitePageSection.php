<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

class WebsitePageSection extends Model
{
    protected $fillable = [
        'website_page_id',
        'heading',
        'body',
        'image_id',
        'layout_key',
        'content',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'content' => 'array',
        'is_active' => 'boolean',
    ];

    public function page()
    {
        return $this->belongsTo(WebsitePage::class, 'website_page_id');
    }
}
