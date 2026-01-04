<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class AdminSettingController extends Controller
{
    public function index()
    {
        $setting_data = Setting::where('id', 1)->first();
        return view('admin.setting', compact('setting_data'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'header_text' => 'required',
            'footer_copyright' => 'required',
            'preloader_status' => 'required',
            'theme_color' => 'required'
        ]);



        $obj = Setting::where('id',$id)->first();

        //LOGO
        if($request->hasFile('logo'))
        {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            if(file_exists('uploads/'.$obj->logo) && $obj->logo!=NULL ){
                unlink(public_path('uploads/'.$obj->logo));
            }

            $ext = $request->file('logo')->extension();
            $final_name = 'logo_'.md5(time()).'.'.$ext;
            $request->file('logo')->move(public_path('uploads/'),$final_name);
            $obj->logo = $final_name;

        }

        //Favicon
        if($request->hasFile('favicon'))
        {
            $request->validate([
                'photo' => 'image|mimes:ico'
            ]);

            if(file_exists('uploads/'.$obj->favicon) && $obj->favicon!=NULL ){
                unlink(public_path('uploads/'.$obj->favicon));
            }

            $ext = $request->file('favicon')->extension();
            $final_name = 'favicon_'.md5(time()).'.'.$ext;
            $request->file('favicon')->move(public_path('uploads/'),$final_name);
            $obj->favicon = $final_name;
        }


        //Logo Footer
        if($request->hasFile('logo_footer'))
        {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            if(file_exists('uploads/'.$obj->logo_footer) && $obj->logo_footer!=NULL ){
                unlink(public_path('uploads/'.$obj->logo_footer));
            }

            $ext = $request->file('logo_footer')->extension();
            $final_name = 'logo_footer_'.md5(time()).'.'.$ext;
            $request->file('logo_footer')->move(public_path('uploads/'),$final_name);
            $obj->logo_footer = $final_name;

        }

        $obj->header_text = $request->header_text;
        $obj->footer_text = $request->footer_text;
        $obj->footer_copyright=$request->footer_copyright;
        $obj->preloader_status=$request->preloader_status;
        $obj->theme_color=$request->theme_color;
        $obj->footer_icon_1=$request->footer_icon_1;
        $obj->footer_icon_1_url=$request->footer_icon_1_url;
        $obj->footer_icon_2=$request->footer_icon_2;
        $obj->footer_icon_2_url=$request->footer_icon_2_url;
        $obj->footer_icon_3=$request->footer_icon_3;
        $obj->footer_icon_3_url=$request->footer_icon_3_url;
        $obj->footer_icon_4=$request->footer_icon_4;
        $obj->footer_icon_4_url=$request->footer_icon_4_url;

        $obj->update();

        return redirect()->route('admin_setting')->with('success','Data is updated successfully');



    }

}
