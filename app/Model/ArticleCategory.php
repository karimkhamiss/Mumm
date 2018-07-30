<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $table = 'articles';
    protected $fillable = ['category_id', 'article_id'];
    protected $dates = ['deleted_at'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
