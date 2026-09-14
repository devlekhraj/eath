<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuideReview extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'guide_id',
        'reviewer_name',
        'reviewer_country',
        'rating',
        'title',
        'body',
        'reviewed_on',
        'is_featured',
        'is_published',
        'sort_order',
    ];

    protected $casts = [
        'rating' => 'integer',
        'reviewed_on' => 'date',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    protected $appends = [
        'comment',
        'reviewer',
    ];

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }

    public function getCommentAttribute(): ?string
    {
        return $this->body;
    }

    public function getReviewerAttribute(): array
    {
        return [
            'name' => $this->reviewer_name ?? 'Anonymous Explorer',
            'country' => $this->reviewer_country,
        ];
    }
}
