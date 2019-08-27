<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
    	'id', 'user_id', 'category_id', 'body', 'image',


    ];

   public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }
   public function category()
    {
    	return $this->belongsTo('App\Categories', 'category_id');

    }
    public function post_comments()
    {
        return $this->hasMany('App\Comments', 'post_id')->orderBy('id', 'DESC');
    }
     public function like()
    {
        return $this->hasMany('App\Likes', 'post_id')->orderBy('id', 'DESC');
    }
}
