<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Inquiry extends Model
{
    protected $guarded = [];
    protected $casts = [
        "is_active" => "boolean"
    ];
}
