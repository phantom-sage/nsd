<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Comments
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    // user
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // likes
    public function like()
    {
        return $this->hasOne('App\Like');
    }
}
