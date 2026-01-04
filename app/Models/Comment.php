<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function rCommentPost()
    {
        return $this->belongsTo(Post::class, 'post_id');
        //Joined
    }



    public function rReply()
    {
        return $this->hasMany(Reply::class);
        //Joined
    }

}
