<?php

namespace Admin\Models;

use Admin\Models\Concerns\HasFaqs;
use Admin\Models\Concerns\HasMediaAttachments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guide extends Model
{
    use SoftDeletes, HasFaqs, HasMediaAttachments;

    protected $fillable = [
        'name',
        'slug',
        'role',
        'email',
        'phone',
        'biography',
        'languages',
        'qualifications',
        'years_experience',
        'is_featured',
        'is_active',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'languages' => 'array',
        'qualifications' => 'array',
        'years_experience' => 'integer',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function journeys()
    {
        return $this->belongsToMany(Journey::class)->withPivot(['role', 'sort_order'])->withTimestamps();
    }

    public function reviews()
    {
        return $this->hasMany(GuideReview::class)->orderByDesc('reviewed_on');
    }
}
