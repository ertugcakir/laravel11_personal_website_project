<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function rPostCategory()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
        //Joined
    }

}
