<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageItierary extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];

    public function highlights(){
        return $this->hasMany(ItineraryHighlight::class,'itinerary_id','id')->orderBy('sort_order','asc');
    }
}


