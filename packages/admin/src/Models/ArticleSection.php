<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleSection extends Model
{
    protected $fillable = ['article_id', 'heading', 'body', 'sort_order'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
