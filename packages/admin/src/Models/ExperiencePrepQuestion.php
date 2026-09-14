<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

class ExperiencePrepQuestion extends Model
{
    protected $fillable = [
        'experience_id',
        'title',
        'body',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
}
