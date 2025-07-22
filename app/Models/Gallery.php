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
        'file_size',
        'alt_text',
    ];

    protected $appends = ['url', 'size'];

    public function usages(): HasMany
    {
        return $this->hasMany(GalleryUsage::class);
    }

    public function getUrlAttribute(): string
    {
        $filePath = storage_path($this->file_path); // assumes full path to file in storage
        return file_exists($filePath)
            ? route('image.view', ['filename' => $this->filename])
            : asset('images/default.jpg');
    }


    public function getSizeAttribute(): string
    {
        $bytes = $this->file_size;

        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        }

        return number_format($bytes / 1024, 2) . ' KB';
    }
}
