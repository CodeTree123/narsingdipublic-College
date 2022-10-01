<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Department;
use App\Semester;
use App\Subject;
use Illuminate\Support\Str;
class SubjectController extends Controller
{
   public function index(){
       $categories=Subject::orderBy('id','asc')->get();
       $deps=Department::all();
       $sems=Semester::all();
       $categories1 = Semester::all();
    	return view('admin.subject.manage',['categories'=>$categories,'deps'=>$deps,'sems'=>$sems,'categories1'=>$categories1]);
    }

    public function create(){

      $categories1 =Department::orderBy('id','desc')->get();;
     return view('admin.subject.add',['categories1'=>$categories1]);
    }


     public function store(Request $request)
    {
       $this->validate($request,[
            'subject_name' => 'required'

        ]);
        $category = new Subject();
        $category->subject_name = $request->subject_name;

        $category->department_id=$request->department_id;
        $category->status = $request->status;
        $category->save();
        Toastr::success('Successfully Saved :)' ,'Success');
        return redirect()->route('admin.subject.create');
    }

    public function destroy($id)
    {
         Subject::find($id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }
}
