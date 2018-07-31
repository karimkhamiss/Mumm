<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name','description'];
    protected $dates = ['deleted_at'];
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
