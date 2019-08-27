<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
