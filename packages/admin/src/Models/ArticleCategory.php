<?php

namespace Admin\Models;

use Admin\Models\Concerns\HasFaqs;
use Admin\Models\Concerns\HasMediaAttachments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleCategory extends Model
{
    use SoftDeletes, HasMediaAttachments, HasFaqs;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'sort_order',
        'is_active',
        'kicker',
        'tagline',
        'summary',
        'lead',
        'icon',
        'rules',
        'hazards',
        'checklists',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'rules' => 'array',
        'hazards' => 'array',
        'checklists' => 'array',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
