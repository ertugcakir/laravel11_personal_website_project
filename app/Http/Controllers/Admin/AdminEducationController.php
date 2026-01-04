<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;

class AdminEducationController extends Controller
{
    public function index()
    {
        $all_data = Education::orderBy('item_order','asc')->get();
        return view('admin.education_show', compact('all_data'));
    }

    public function add()
    {
        return view('admin.education_add');
    }

    public function store(Request $request)
    {

        $request->validate([
            'program' => 'required',
            'university' => 'required'
        ]);

        $obj = new Education();
        $obj->program = $request->program;
        $obj->university=$request->university;
        $obj->date = $request->date;
        $obj->item_order=$request->item_order;
        $obj->save();

        return redirect()->route('admin_education_show')->with('success','Data is inserted successfully');

    }

    public function edit($id)
    {
        $row_data = Education::where('id',$id)->first();
        return view('admin.education_edit', compact('row_data'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'program' => 'required',
            'university' => 'required'
        ]);

        $obj = Education::where('id',$id)->first();
        $obj->program = $request->program;
        $obj->university=$request->university;
        $obj->date = $request->date;
        $obj->item_order=$request->item_order;
        $obj->update();

        return redirect()->route('admin_education_show')->with('success','Data is updated successfully');

    }

    public function delete($id)
    {
        $row_data = Education::where('id',$id)->first();
        $row_data->delete();

        return redirect()->back()->with('success','Data is deleted successfully');

    }
}
