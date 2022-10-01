<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Classinfo;
use App\Department;
use App\Semester;
use Illuminate\Support\Str;

class ClassinfoController extends Controller
{
    public function index()
    {
        $categories1 = Semester::all();
        $categories2 = Department::all();
        $categories  = Classinfo::orderBy('id', 'asc')->get();
        return view(
            'admin.classInfo.manage',
            [
                'categories1'  => $categories1,
                'categories'  => $categories,
                'categories2' => $categories2
            ]
        );
    }

    public function create()
    {
        $categories1 = Semester::all();
        $categories2 = Department::all();

        return view(
            'admin.classInfo.add',
            [
                'categories1'  => $categories1,
                'categories2' => $categories2
            ]
        );
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'section_name' => 'required',
            ]
        );

        $category               = new Classinfo();
        $category->section_name = $request->section_name;
        $category->semester_id  = $request->semester_id;
        $category->section_id   = $request->section_id;
        $category->status       = $request->status;
        $category->save();

        Toastr::success('Successfully Saved :)', 'Success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        Classinfo::find($id)->delete();
        Toastr::warning('Successfully Deleted :)', 'Success');
        return redirect()->back();
    }

    public function edit($id)
    {
        $cats        = Classinfo::where('id', $id)->first();
        $departments = Department::all();
        return view(
            'admin.classInfo.edit',
            [
                'cats'        => $cats,
                'departments' => $departments
            ]
        );
    }

    public function update(Request $request)
    {
        Classinfo::where('id', $request->id)
            ->update([
                'section_id'   => $request->section_id,
                'section_name' => $request->section_name,
                'status'       => $request->status
            ]);

        Toastr::success('Successully Updated :)', 'Success');
        return redirect('/admin/classInformation')->with('message', 'Updated Successfully');
    }
}
