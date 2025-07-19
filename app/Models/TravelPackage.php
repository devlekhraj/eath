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
}
