<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryUsage extends Model
{
    protected $guarded = []; 

    // Append virtual attribute
    protected $appends = ['url'];
    protected $casts = [
        'custom_attributes' => 'array',
    ];


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
