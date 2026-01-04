<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class AdminClientController extends Controller
{
    public function index()
    {
        $all_data = Client::get();
        return view('admin.client_show', compact('all_data'));
    }

    public function add()
    {
        return view('admin.client_add');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'url' => 'required',
            'photo'  => 'required|image|mimes:jpg,jpeg,png,gif'

        ]);

        $obj = new Client();

        $ext = $request->file('photo')->extension();
        $final_name = 'client_photo_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);
        $obj->photo = $final_name;

        $obj->name = $request->name;
        $obj->url=$request->url;
        $obj->save();

        return redirect()->route('admin_client_show')->with('success','Data is inserted successfully');

    }

    public function edit($id)
    {
        $row_data = Client::where('id',$id)->first();
        return view('admin.client_edit', compact('row_data'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'url' => 'url'
        ]);



        $obj = Client::where('id',$id)->first();

        if($request->hasFile('photo'))
        {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            if(file_exists('uploads/'.$obj->photo) && $obj->photo!=NULL ){
                unlink(public_path('uploads/'.$obj->photo));
            }

            $ext = $request->file('photo')->extension();
            $final_name = 'client_photo_'.time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$final_name);
            $obj->photo = $final_name;

        }

        $obj->name = $request->name;
        $obj->url=$request->url;
        $obj->update();

        return redirect()->route('admin_client_show')->with('success','Data is updated successfully');

    }

    public function delete($id)
    {
        $row_data = Client::where('id',$id)->first();
        $row_data->delete();

        return redirect()->back()->with('success','Data is deleted successfully');

    }
}
