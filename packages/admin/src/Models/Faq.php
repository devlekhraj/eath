<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'question',
        'answer',
        'category',
        'journey_id',
        'destination_id',
        'experience_id',
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

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
}
