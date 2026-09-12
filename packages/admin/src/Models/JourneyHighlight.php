<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JourneyHighlight extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'journey_id',
        'title',
        'description',
        'icon',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function journey()
    {
        return $this->belongsTo(Journey::class);
    }
}
