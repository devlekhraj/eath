<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryUsage extends Model
{
    protected $fillable = [
        'gallery_id',
        'usage_id',
        'usage_type',
        'alt_text',
    ];

    // Append virtual attribute
    protected $appends = ['url'];

    public function gallery(): BelongsTo
    {
        return $this->belongsTo(Gallery::class);
    }

    // Accessor for the gallery url
    public function getUrlAttribute(): ?string
    {
        return $this->gallery?->url; // null-safe access
    }
}
