<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

class DestinationLogistics extends Model
{
    protected $table = 'destination_logistics';

    protected $fillable = [
        'destination_id',
        'label',
        'value',
        'icon',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
