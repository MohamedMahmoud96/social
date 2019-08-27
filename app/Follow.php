<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
  
   protected $fillable = ['user_id', 'follower'];

   public function user_follower()
   {
   		return $this->belongsTo('App\User', 'follower')->orderBy('id', 'DESC');
   }

    public function user_following()
   {
   		return $this->belongsTo('App\User', 'user_id')->orderBy('id', 'DESC');
   }

    public function post_following()
   {
   		return $this->hasMany('App\Posts', 'user_id', 'user_id')->orderBy('id', 'DESC');
   }
      public function post_follower()
   {
   		return $this->hasMany('App\Posts', 'user_id', 'follower')->orderBy('id', 'DESC');
   }
}
