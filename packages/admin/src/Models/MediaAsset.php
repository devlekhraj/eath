<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class MediaAsset extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'hash',
        'disk',
        'filename',
        'path',
        'mime_type',
        'size_bytes',
        'width',
        'height',
        'title',
        'alt_text',
        'caption',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'array',
        'size_bytes' => 'integer',
        'width' => 'integer',
        'height' => 'integer',
    ];

    protected $appends = [
        'url',
        'formatted_size',
    ];

    public function variants()
    {
        return $this->hasMany(MediaVariant::class);
    }

    public function attachments()
    {
        return $this->hasMany(MediaAttachment::class);
    }

    public function getUrlAttribute(): string
    {
        if (empty($this->path)) {
            return asset('images/placeholder.jpg');
        }

        if (str_starts_with($this->path, 'http://') || str_starts_with($this->path, 'https://')) {
            return $this->path;
        }

        try {
            $disk = $this->disk ?: 'public';
            if (config("filesystems.disks.{$disk}")) {
                return Storage::disk($disk)->url($this->path);
            }
        } catch (\Throwable $e) {
            // Fallback
        }

        return asset('storage/' . ltrim($this->path, '/'));
    }

    public function getFormattedSizeAttribute(): string
    {
        $bytes = (int) $this->size_bytes;
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 1) . ' MB';
        }
        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 0) . ' KB';
        }
        return $bytes . ' B';
    }
}
