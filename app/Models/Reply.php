<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function rReplyPost()
    {
        return $this->belongsTo(Post::class, 'post_id');
        //Joined
    }

    public function rComment()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
        //Joined
    }

}
