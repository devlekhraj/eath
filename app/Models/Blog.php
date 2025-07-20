<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'slug',
        'sub_title',
        'content',
        'cover_image',
        'author',
        'is_published',
        'is_active',
        'meta_title',
        'meta_description',
        'meta_keyword',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected $dates = [
        'deleted_at',
    ];
}
