<?php

namespace Admin\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function booted()
    {
        static::creating(function ($blog) {
            if (empty($blog->slug) && !empty($blog->title)) {
                $slug = Str::slug($blog->title);

                // Ensure uniqueness if needed (optional but recommended)
                $originalSlug = $slug;
                $count = 1;

                while (static::where('slug', $slug)->exists()) {
                    $slug = "{$originalSlug}-{$count}";
                    $count++;
                }

                $blog->slug = $slug;
            }
        });
    }
}
