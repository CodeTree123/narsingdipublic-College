<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Department;
use App\Semester;
use App\Subject;
use App\Student;
use App\Sparent;
use App\Sparents;
use Illuminate\Support\Str;

class ParentController extends Controller
{
     public function index(){
       $categories=Sparents::orderBy('id','asc')->get();
       $deps=Student::all();
       $sems=Semester::all();
       $categories1 = Semester::all();
    	return view('admin.parent.manage',['categories'=>$categories,'deps'=>$deps,'sems'=>$sems,'categories1'=>$categories1]);
    }


     public function create(){
      $categories=Student::orderBy('id','desc')->get();
      $categories1 = Semester::all();
     return view('admin.parent.add',['categories'=>$categories,'categories1'=>$categories1]);
    }


     public function store(Request $request)
    {
       $this->validate($request,[
            'name' => 'required'

        ]);
        $category = new Sparents();
        $category->name = $request->name;
        $category->students_id=$request->student_id;
        $category->phone=$request->phone;
        $category->email=$request->email;
        $category->address=$request->address;
        //$category->status = $request->status;
        $category->save();
        Toastr::success('Successfully Saved :)' ,'Success');
        return redirect()->route('admin.parent.create');
    }

    public function destroy($id)
    {
         Sparents::find($id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }
}
