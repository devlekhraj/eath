<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItineraryHighlight extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    protected $appends = ['icon_url', 'highlight_name'];

    public function lookup()
    {
        return $this->belongsTo(Lookup::class, 'lookup_id');
    }

    public function getHighlightNameAttribute()
    {
        return $this->lookup?->name ?? '';
    }

    public function getIconUrlAttribute(): string
    {
        return $this->lookup?->icon_url ?? asset('images/default.jpg');
    }
}
