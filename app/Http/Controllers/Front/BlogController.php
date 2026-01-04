<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PageItem;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\Admin;
use Auth;

class BlogController extends Controller
{
    public function index()
    {
        $page_data = PageItem::where('id',1)->first();
        $posts = Post::orderBy('id','desc')->paginate(12);
        return view('front.blog',compact('posts','page_data'));
    }

    public function post_detail($slug)
    {

        $post_detail = Post::where('slug',$slug)->with('rPostCategory')->first();

        if($post_detail==null)
        {
            return redirect()->route('blog')->with('error', '404! Aradığınız gönderi bulunamadı');
        }

        $posts = Post::orderBy('id','desc')->take(5)->get();
        $post_categories = PostCategory::orderBy('id','asc')->get();
        $comments = Comment::with('rReply')->where('post_id',$post_detail->id)->where('status',1)->get();
        $commentCount = Comment::where('post_id',$post_detail->id)->where('status',1)->count();
        $replyCount = Reply::where('post_id',$post_detail->id)->where('status',1)->count();
        $totalCommentCount = $commentCount+$replyCount;
        $archive_results = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) data')
                ->groupBy('year', 'month')
                ->orderBy('year', 'desc')->take(10)
                ->get();
        $admin_data = Admin::Where('id', $post_detail->user_id)->first();

        return view('front.blog_post_detail', compact('post_detail','posts','post_categories','admin_data','archive_results','comments','totalCommentCount'));
    }

    public function category($slug)
    {
        $category=PostCategory::where('category_slug',$slug)->first();

        if($category==NULL)
        {
            return redirect()->route('blog')->with('error', '404! Aradığınız gönderi bulunamadı');
        }

        $page_data = PageItem::where('id',1)->first();

        $posts = Post::where('post_category_id',$category->id)->orderBy('id','desc')->paginate(12);
        return view('front.blog_category_detail',compact('category','posts','page_data'));
    }

    public function archive($month, $year)
    {

        $month=(int)$month;
        $year=(int)$year;

        $page_data = PageItem::where('id',1)->first();

        $posts = Post::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->orderBy('id','desc')->paginate(12);

        if(count($posts)==0)
        {
            return redirect()->route('blog')->with('error', '404! Aradığınız gönderi bulunamadı');
        }

        return view('front.blog_archive_detail',compact('posts','page_data','month','year'));

    }

    public function search(Request $request)
    {
        $search_text=trim($request->search_text);
         $search_text_sql='%'.$search_text.'%';

        $page_data = PageItem::where('id',1)->first();

        $posts = Post::where('title','like',$search_text_sql)->orWhere('description','like', $search_text_sql)->orderBy('id','desc')->paginate(12);
        return view('front.blog_search_detail',compact('posts','page_data','search_text'));
    }

    public function comment_submit(Request $request)
    {
        $request->validate([
            'person_name'=>'required',
            'person_email'=>'required|email',
            'person_comment'=>'required',
            'post_id'=>'required'
        ]);

        $obj = new Comment();
        $obj->person_name = $request->person_name;
        $obj->person_email = $request->person_email;
        $obj->person_comment = $request->person_comment;
        $obj->post_id = $request->post_id;
        $obj->status = 0; // Pending // 1-Approved
        $obj->person_type=0; // Guest // 1-Admin
        $obj->save();

        return redirect()->back()->with('success','Yorumunuz onaylanmak üzere kaydedildi. Yorumunuz için teşekkür ederiz.');

    }


    public function reply_submit(Request $request)
    {
        $request->validate([
            'person_name'=>'required',
            'person_email'=>'required|email',
            'person_comment'=>'required',
            'post_id'=>'required',
            'comment_id'=>'required'
        ]);

        $obj = new Reply();
        $obj->person_name = $request->person_name;
        $obj->person_email = $request->person_email;
        $obj->person_comment = $request->person_comment;
        $obj->post_id = $request->post_id;
        $obj->comment_id = $request->comment_id;
        $obj->status = 0; // Pending // 1-Approved
        $obj->person_type=0; // Guest // 1-Admin
        $obj->save();

        return redirect()->back()->with('success','Yorumunuz onaylanmak üzere kaydedildi. Yorumunuz için teşekkür ederiz.');

    }


    public function comment_submit_admin(Request $request)
    {
        $admin_data = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        $request->validate([
            'person_comment'=>'required',
            'post_id'=>'required'
        ]);

        $obj = new Comment();
        $obj->person_name = $admin_data->name;
        $obj->person_email = $admin_data->email;
        $obj->person_comment = $request->person_comment;
        $obj->post_id = $request->post_id;
        $obj->status = 1; // Pending // 1-Approved
        $obj->person_type=1; // Guest // 1-Admin
        $obj->save();

        return redirect()->back()->with('success','Yorumunuz onaylanarak kaydedildi.');

    }


    public function reply_submit_admin(Request $request)
    {
        $admin_data = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        $request->validate([
            'person_comment'=>'required',
            'post_id'=>'required',
            'comment_id'=>'required'
        ]);

        $obj = new Reply();
        $obj->person_name = $admin_data->name;
        $obj->person_email = $admin_data->email;
        $obj->person_comment = $request->person_comment;
        $obj->post_id = $request->post_id;
        $obj->comment_id = $request->comment_id;
        $obj->status = 1; // Pending // 1-Approved
        $obj->person_type=1; // Guest // 1-Admin
        $obj->save();

        return redirect()->back()->with('success','Yorumunuz onaylanarak kaydedildi.');

    }

}
