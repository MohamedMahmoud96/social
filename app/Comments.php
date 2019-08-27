<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
   public function user()
   {
   	return $this->belongsTo('App\User', 'user_id');
   }
   public function reply()
   {
   	return	$this->hasMany('App\ReplyComment', 'comment_id')->orderBy('id', 'DESC');
   }


}
