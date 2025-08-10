<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Setting extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($setting) {
            $setting->code = $setting->generateUniqueCode($setting->name);
        });

        static::updating(function ($setting) {
            if ($setting->isDirty('name')) {
                $setting->code = $setting->generateUniqueCode($setting->name, $setting->id);
            }
        });

        static::deleting(function ($setting) {
            if ($setting->code && !str_ends_with($setting->code, '_deleted')) {
                $setting->code = $setting->code . '_deleted';
                $setting->saveQuietly();
            }
        });
    }

    /**
     * Generate a unique code from the name.
     */
    private function generateUniqueCode($name, $ignoreId = null)
    {
        $baseCode = Str::slug($name, '_');
        $code = $baseCode;
        $counter = 1;

        while (static::where('code', $code)
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists()) {
            $code = $baseCode . '_' . $counter++;
        }

        return $code;
    }
}
