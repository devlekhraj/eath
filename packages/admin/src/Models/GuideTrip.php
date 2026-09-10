<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuideTrip extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $with = ['travelPackage'];


    /**
     * Relation to TravelPackage
     */
    public function travelPackage()
    {
        return $this->belongsTo(TravelPackage::class, 'travel_package_id', 'id');
    }
}
