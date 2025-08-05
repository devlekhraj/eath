<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackagePrice extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    
    protected $casts = [
        "is_economy" => "boolean",
        "is_default" => "boolean",
        "is_active" => "boolean",
    ];
}
