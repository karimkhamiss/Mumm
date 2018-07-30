<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name'];
    protected $dates = ['deleted_at'];
    public function category_articles()
    {
        return $this->hasMany(ArticleCategory::class);
    }
}
