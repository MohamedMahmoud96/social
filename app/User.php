<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_following()
    {
        return $this->hasMany('App\Follow', 'user_id')->orderBy('id', 'DESC');
    }
    public function user_follower()
    {
        return $this->hasMany('App\Follow', 'follower')->orderBy('id', 'DESC');
    }
    public function posts()
    {
      return  $this->hasMany('App\Posts','user_id')->orderBy('id', 'DESC');
    }
    public function like()
    {
        return $this->hasMany('App\Likes', 'user_id')->orderBy('id', 'DESC');
    }
}
