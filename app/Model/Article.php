<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = ['user_id', 'title', 'body','cover'];
    protected $dates = ['deleted_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function article_categories()
    {
        return $this->hasMany(ArticleCategory::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
