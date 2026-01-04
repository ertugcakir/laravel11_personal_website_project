<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\PortfolioPhoto;
use App\Models\PortfolioVideo;

class AdminPortfolioController extends Controller
{
    public function index()
    {
        // Join Table
        //$all_data = DB::table('portfolios')->join('portfolio_categories','portfolio_categories.id','=','portfolios.portfolio_category_id')->get();

        //Joined Model
        $all_data = Portfolio::orderBy('id','asc')->with('rPortfolioCategory')->get();

        return view('admin.portfolio_show', compact('all_data'));
    }

    public function add()
    {
        $category_data = PortfolioCategory::orderBy('id','asc')->get();
        return view('admin.portfolio_add',compact('category_data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'slug' => ['required','alpha_dash', Rule::unique('portfolios')],
            'portfolio_category_id' => 'required',
            'description' => 'required',
            'photo'  => 'required|image|mimes:jpg,jpeg,png,gif',
            'banner'  => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $obj = new Portfolio();

        $ext = $request->file('photo')->extension();
        $final_name = 'portfolio_photo_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);
        $obj->photo = $final_name;

        $ext = $request->file('banner')->extension();
        $final_name2 = 'portfolio_banner_'.time().'.'.$ext;
        $request->file('banner')->move(public_path('uploads/'),$final_name2);
        $obj->banner = $final_name2;

        $obj->name = $request->name;
        $obj->slug = $request->slug;
        $obj->description=$request->description;
        $obj->portfolio_category_id=$request->portfolio_category_id;
        $obj->project_client=$request->project_client;
        $obj->project_company=$request->project_company;
        $obj->project_start_date=$request->project_start_date;
        $obj->project_end_date=$request->project_end_date;
        $obj->project_cost=$request->project_cost;
        $obj->project_website=$request->project_website;
        $obj->seo_title=$request->seo_title;
        $obj->seo_meta_description = $request->seo_meta_description;
        $obj->save();

        return redirect()->route('admin_portfolio_show')->with('success','Data is inserted successfully');

    }

    public function edit($id)
    {
        $row_data = Portfolio::where('id',$id)->first();
        $category_data = PortfolioCategory::orderBy('id','asc')->get();
        return view('admin.portfolio_edit', compact('row_data','category_data'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'slug' => ['required','alpha_dash', Rule::unique('portfolios')->ignore($id)],
            'portfolio_category_id' => 'required',
            'description' => 'required'
        ]);



        $obj = Portfolio::where('id',$id)->first();

        if($request->hasFile('photo'))
        {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            if(file_exists('uploads/'.$obj->photo) && $obj->photo!=NULL ){
                unlink(public_path('uploads/'.$obj->photo));
            }

            $ext = $request->file('photo')->extension();
            $final_name = 'portfolio_photo_'.time().'.'.$ext;
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
            $final_name = 'portfolio_banner_'.time().'.'.$ext;
            $request->file('banner')->move(public_path('uploads/'),$final_name);
            $obj->banner = $final_name;

        }

        $obj->name = $request->name;
        $obj->slug = $request->slug;
        $obj->description=$request->description;
        $obj->portfolio_category_id=$request->portfolio_category_id;
        $obj->project_client=$request->project_client;
        $obj->project_company=$request->project_company;
        $obj->project_start_date=$request->project_start_date;
        $obj->project_end_date=$request->project_end_date;
        $obj->project_cost=$request->project_cost;
        $obj->project_website=$request->project_website;
        $obj->update();

        return redirect()->route('admin_portfolio_show')->with('success','Data is updated successfully');

    }

    public function delete($id)
    {
        $row_data = Portfolio::where('id',$id)->first();
        unlink(public_path('uploads/'.$row_data->photo));
        unlink(public_path('uploads/'.$row_data->banner));
        $row_data->delete();


        // Delete photo gallery items
        $photo_rows=PortfolioPhoto::where('portfolio_id',$id)->get();
        foreach($photo_rows as $item)
        {
            unlink(public_path('uploads/'.$item->photo));
            $item->delete();
        }

        //Delete video gallery items
        $video_rows=PortfolioVideo::where('portfolio_id',$id)->get();
        foreach($video_rows as $item)
        {
            $item->delete();
        }

        return redirect()->back()->with('success','Data is deleted successfully');

    }

    public function photo_gallery($id)
    {
        $single_portfolio = Portfolio::where('id',$id)->first();
        $photo_gallery_items = PortfolioPhoto::where('portfolio_id', $id)->get();
        return view('admin.portfolio_photo_gallery_show', compact('photo_gallery_items', 'single_portfolio'));
    }



    public function photo_gallery_submit(Request $request, $portfolio_id)
    {

        $request->validate([
            'photo'  => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $obj = new PortfolioPhoto();

        $ext = $request->file('photo')->extension();
        $final_name = 'portfolio__gallery_photo_'.md5(time()).'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);
        $obj->photo = $final_name;

        $obj->portfolio_id = $portfolio_id;
        $obj->save();

        return redirect()->back()->with('success','Data is inserted successfully');

    }


    public function photo_gallery_delete($id)
    {
        $row_data = PortfolioPhoto::where('id',$id)->first();

        if(file_exists('uploads/'.$row_data->photo) && $row_data->photo!=NULL ){
            unlink(public_path('uploads/'.$row_data->photo));
        }

        $row_data->delete();

        return redirect()->back()->with('success','Data is deleted successfully');

    }


    public function video_gallery($id)
    {
        $single_portfolio = Portfolio::where('id',$id)->first();
        $video_gallery_items = PortfolioVideo::where('portfolio_id', $id)->get();
        return view('admin.portfolio_video_gallery_show', compact('video_gallery_items', 'single_portfolio'));
    }



    public function video_gallery_submit(Request $request, $portfolio_id)
    {

        $request->validate([
            'caption'  => 'required',
            'video_id' => 'required'
        ]);

        $obj = new PortfolioVideo();

        $obj->portfolio_id = $portfolio_id;
        $obj->caption = $request->caption;
        $obj->video_id = $request->video_id;
        $obj->save();

        return redirect()->back()->with('success','Data is inserted successfully');

    }


    public function video_gallery_delete($id)
    {
        $row_data = PortfolioVideo::where('id',$id)->first();
        $row_data->delete();

        return redirect()->back()->with('success','Data is deleted successfully');

    }

}
