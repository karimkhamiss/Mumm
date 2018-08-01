<?php

namespace App;

use App\Model\Article;
use App\Model\Comment;
use App\Model\Role;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = ['first_name', 'last_name', 'username','password','picture','role_id'];
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function getNameAttribute()
    {
        return $this->first_name." ".$this->last_name;
    }
    public function getDateAttribute()
    {
        return date("j F , Y",strtotime($this->created_at));
    }

}
