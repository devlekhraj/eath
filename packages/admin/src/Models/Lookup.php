<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lookup extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    protected $appends = ['icon_url'];

    // public function getIconUrlAttribute(): string
    // {
    //     $filePath = storage_path($this->file_path); // assumes full path to file in storage
    //     return file_exists($filePath)
    //         ? route('image.view', ['filename' => $this->icon])
    //         : asset('images/default.jpg');
    // }
    public function getIconUrlAttribute(): string
    {
        if ($this->icon) {
            return route('image.view', ['filename' => $this->icon]);
        }

        return asset('images/logo.png');
    }
}
