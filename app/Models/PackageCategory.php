<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class PackageCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'is_active',
        'sort_order',
        'description',
    ];

    protected $casts = [
        'is_active' => 'boolean',
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

    public function travelPackages()
    {
        return $this->belongsToMany(
            TravelPackage::class,       // Related model
            'category_package',         // Pivot table name
            'package_category_id',      // Foreign key on pivot table for this model
            'travel_package_id'         // Foreign key on pivot table for related model
        );
    }

    // Relationships
    public function parent()
    {
        return $this->belongsTo(PackageCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(PackageCategory::class, 'parent_id');
    }
}
