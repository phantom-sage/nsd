<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // post
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
