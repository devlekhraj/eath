<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    protected $fillable = [
        'hash',
        'filename',
        'filepath',
        'mime_type',
        'file_size',
        'alt_text',
        'height',
        'width',
        'title'
    ];

    protected $appends = ['url', 'size'];

    public function usages(): HasMany
    {
        return $this->hasMany(GalleryUsage::class);
    }

    public function variants(): HasMany
    {
        return $this->hasMany(GalleryVariant::class);
    }

    public function getUrlAttribute(): string
    {
        if (! $this->filepath) {
            return asset('images/default.jpg');
        }

        $cdnUrl = rtrim(config('filesystems.disks.cdn.url', env('CDN_URL')), '/');
        if ($cdnUrl !== '') {
            return $cdnUrl . '/' . ltrim($this->filepath, '/');
        }

        return Storage::disk('cdn')->url($this->filepath);
    }


    public function getSizeAttribute(): string
    {
        $bytes = is_numeric($this->file_size) ? (float) $this->file_size : 0;

        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        }

        return number_format($bytes / 1024, 2) . ' KB';
    }
}
