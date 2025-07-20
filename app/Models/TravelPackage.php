<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class TravelPackage extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($trvelPackage) {
            if (empty($trvelPackage->slug)) {
                $trvelPackage->slug = Str::slug($trvelPackage->name);
            }
        });

        static::updating(function ($trvelPackage) {
            if (empty($trvelPackage->slug) || $trvelPackage->isDirty('name')) {
                $trvelPackage->slug = Str::slug($trvelPackage->name);
            }
        });
    }

    public function categories()
    {
        return $this->belongsToMany(
            PackageCategory::class,     // Related model
            'category_package',         // Pivot table name
            'travel_package_id',        // Foreign key on pivot table for this model
            'package_category_id'       // Foreign key on pivot table for related model
        );
    }
}
