<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
     protected $fillable = [
    	'id', 'user_id', 'post_id',


    ];
}
