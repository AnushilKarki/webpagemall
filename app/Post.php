<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class,'post_id');
    }
}
