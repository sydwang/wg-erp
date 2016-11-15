<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // charles add this method 
    // 2016-11-11
    public function comments() {
    	return $this->hasMany(Comment::class);

    }

    // charles add this function
    // 2016-11-11
    public function getNumComments() {
    	$num = $this->comments()->count();
    	if ($num == 1) 
    		return '1 comment';
    	return $num . ' comments';

    }
}
