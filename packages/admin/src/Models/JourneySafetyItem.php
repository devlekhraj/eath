<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

class JourneySafetyItem extends Model
{
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
        'sort_order' => 'integer',
    ];

    public function journey()
    {
        return $this->belongsTo(Journey::class);
    }
}
