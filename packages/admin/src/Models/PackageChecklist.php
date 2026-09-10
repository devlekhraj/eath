<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageChecklist extends Model
{
     use SoftDeletes;
    
    protected $guarded = [];
}
