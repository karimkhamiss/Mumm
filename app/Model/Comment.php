<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['article_id', 'name', 'body'];
    protected $dates = ['deleted_at'];
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
