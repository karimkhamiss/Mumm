<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;
    protected $table = 'roles';
    protected $fillable = ['name', 'description', 'permissions'];
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}