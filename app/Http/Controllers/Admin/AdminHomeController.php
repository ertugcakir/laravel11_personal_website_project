<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Reply;

class AdminHomeController extends Controller
{
    public function index()
    {
        $post_count = Post::count();
        $pending_comments_count = Comment::where('status',0)->count();
        $pending_replies_count = Reply::where('status',0)->count();

        return view('admin.home',compact('post_count','pending_comments_count','pending_replies_count'));
    }



}
