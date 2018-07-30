<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = ['user_id', 'title', 'body','category_id','cover'];
    protected $dates = ['deleted_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->hasMany(Category::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
