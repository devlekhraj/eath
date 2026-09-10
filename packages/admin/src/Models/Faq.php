<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $guarded = [];
    protected $casts = [
        "is_active" => "boolean"
    ];
}
