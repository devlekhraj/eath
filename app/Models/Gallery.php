<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gallery extends Model
{
    protected $fillable = [
        'filename',
        'filepath',
        'mime_type',
        'alt_text',
    ];

    public function usages(): HasMany
    {
        return $this->hasMany(GalleryUsage::class);
    }
}
