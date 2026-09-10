<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuideReview extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $casts = [
        "is_approved" => "boolean",
    ];

    /**
     * Get the guide that this review belongs to.
     */
    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }

    /**
     * Get the reviewer (user, admin, etc.) that wrote this review.
     */
    public function reviewer()
    {
        return $this->morphTo();
    }
}
