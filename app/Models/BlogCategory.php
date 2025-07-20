<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use SoftDeletes;

    protected $table = 'blog_categories';

    protected $guarded = [];

    protected $dates = [
        'deleted_at',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });

        static::updating(function ($category) {
            if (empty($category->slug) || $category->isDirty('name')) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    // Relationships
    public function parent()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(BlogCategory::class, 'parent_id');
    }

    public function blogs()
    {
        return $this->belongsToMany(
            Blog::class,           // Related model
            'category_blog',       // Pivot table name
            'blog_category_id',    // Foreign key on pivot table for this model
            'blog_id'              // Foreign key on pivot table for related model
        );
    }
}
