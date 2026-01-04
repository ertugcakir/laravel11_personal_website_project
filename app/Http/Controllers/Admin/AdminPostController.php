<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Admin;
use App\Models\Comment;
use App\Models\Reply;
use Auth;

class AdminPostController extends Controller
{
public function index()
    {
        //Joined Model
        $all_data = Post::orderBy('id','asc')->with('rPostCategory')->paginate(25);

        return view('admin.post_show', compact('all_data'));
    }

    public function add()
    {
        $category_data = PostCategory::orderBy('id','asc')->get();
        return view('admin.post_add',compact('category_data'));
    }

    public function store(Request $request)
    {
        // Start : User Admin Data
        $admin_data = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        // Finish : User Admin Date

        $request->validate([
            'title' => 'required',
            'slug' => ['required','alpha_dash', Rule::unique('posts')],
            'post_category_id' => 'required',
            'description' => 'required',
            'short_description' => 'required',
            'photo'  => 'required|image|mimes:jpg,jpeg,png,gif',
            'banner'  => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $obj = new Post();

        $ext = $request->file('photo')->extension();
        $final_name = 'post_photo_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);
        $obj->photo = $final_name; // photo

        $ext = $request->file('banner')->extension();
        $final_name2 = 'post_banner_'.time().'.'.$ext;
        $request->file('banner')->move(public_path('uploads/'),$final_name2);
        $obj->banner = $final_name2; //banner

        $obj->title = $request->title;
        $obj->slug = $request->slug;
        $obj->description=$request->description;
        $obj->short_description=$request->short_description;
        $obj->post_category_id=$request->post_category_id;
        $obj->show_comment=$request->show_comment;
        $obj->user_id = $admin_data->id; //User_id
        $obj->seo_title=$request->seo_title;
        $obj->seo_meta_description = $request->seo_meta_description;
        $obj->save();

        return redirect()->route('admin_post_show')->with('success','Data is inserted successfully');

    }

    public function edit($id)
    {
        $row_data = Post::where('id',$id)->first();
        $category_data = PostCategory::orderBy('id','asc')->get();
        return view('admin.post_edit', compact('row_data','category_data'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'slug' => ['required','alpha_dash', Rule::unique('posts')->ignore($id)],
            'post_category_id' => 'required',
            'description' => 'required',
            'short_description' => 'required'
        ]);



        $obj = Post::where('id',$id)->first();

        if($request->hasFile('photo'))
        {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            if(file_exists('uploads/'.$obj->photo) && $obj->photo!=NULL ){
                unlink(public_path('uploads/'.$obj->photo));
            }

            $ext = $request->file('photo')->extension();
            $final_name = 'post_photo_'.time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$final_name);
            $obj->photo = $final_name;

        }

        if($request->hasFile('banner'))
        {
            $request->validate([
                'banner' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            if(file_exists('uploads/'.$obj->banner) && $obj->banner!=NULL ){
                unlink(public_path('uploads/'.$obj->banner));
            }

            $ext = $request->file('banner')->extension();
            $final_name = 'post_banner_'.time().'.'.$ext;
            $request->file('banner')->move(public_path('uploads/'),$final_name);
            $obj->banner = $final_name;

        }

        $obj->title = $request->title;
        $obj->slug = $request->slug;
        $obj->description=$request->description;
        $obj->short_description=$request->short_description;
        $obj->post_category_id=$request->post_category_id;
        $obj->show_comment=$request->show_comment;

        $obj->seo_title=$request->seo_title;
        $obj->seo_meta_description = $request->seo_meta_description;

        $obj->update();

        return redirect()->route('admin_post_show')->with('success','Data is updated successfully');

    }

    public function delete($id)
    {
        $row_data = Post::where('id',$id)->first();
        unlink(public_path('uploads/'.$row_data->photo));
        unlink(public_path('uploads/'.$row_data->banner));
        $row_data->delete();

        return redirect()->back()->with('success','Data is deleted successfully');
    }

    public function comment_pending()
    {
        $pending_comments = Comment::with('rCommentPost')->where('status',0)->paginate(25);
        return view('admin.comment_pending',compact('pending_comments'));
    }

    public function comment_approved()
    {
        $approved_comments = Comment::with('rCommentPost')->where('status',1)->paginate(25);
        return view('admin.comment_approved',compact('approved_comments'));
    }

    public function comment_make_pending($id)
    {
        $row_data = Comment::where('id',$id)->first();
        $row_data->status=0;
        $row_data->save();
        return redirect()->back()->with('success','Yorumun onayı kaldırıldı.');
    }

    public function comment_make_approved($id)
    {
        $row_data = Comment::where('id',$id)->first();
        $row_data->status=1;
        $row_data->save();
        return redirect()->back()->with('success','Yorum onaylandı.');
    }


    public function comment_delete($id)
    {
        $row_data = Comment::where('id',$id)->first();
        $row_data->delete();
        return redirect()->back()->with('success','Yorum başarıyla silindi.');

    }

    public function reply_pending()
    {
        $pending_replies = Reply::with('rReplyPost')->with('rComment')->where('status',0)->paginate(25);
        return view('admin.reply_pending',compact('pending_replies'));
    }

    public function reply_approved()
    {
        $approved_replies = Reply::with('rReplyPost')->with('rComment')->where('status',1)->paginate(25);
        return view('admin.reply_approved',compact('approved_replies'));
    }

    public function reply_make_pending($id)
    {
        $row_data = Reply::where('id',$id)->first();
        $row_data->status=0;
        $row_data->save();
        return redirect()->back()->with('success','Yorumun onayı kaldırıldı.');
    }

    public function reply_make_approved($id)
    {
        $row_data = Reply::where('id',$id)->first();
        $row_data->status=1;
        $row_data->save();
        return redirect()->back()->with('success','Yorum onaylandı.');
    }


    public function reply_delete($id)
    {
        $row_data = Reply::where('id',$id)->first();
        $row_data->delete();
        return redirect()->back()->with('success','Yorum başarıyla silindi.');
    }


}
