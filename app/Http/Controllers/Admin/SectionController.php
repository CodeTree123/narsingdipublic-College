<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Department;
use App\Semester;
use Illuminate\Support\Str;
class SectionController extends Controller
{
	public function index(){
       $sems=Semester::all();
       $categories=Department::orderBy('id','desc')->get();
       $categories1 = Semester::all();
    	return view('admin.section.manage',['categories'=>$categories,'sems'=>$sems,'categories1'=>$categories1]);
    }


    public function create(){
       $categories1 = Semester::all();
      $categories=Semester::orderBy('id','desc')->get();
     return view('admin.section.add',['categories'=>$categories,'categories1'=>$categories1]);
    }

     public function store(Request $request)
    {
       $this->validate($request,[
            'name' => 'required'

        ]);
        $category = new Department();
        $category->department_name = $request->name;
        $category->semester_id=$request->semester_id;
        $category->status = $request->status;
        $category->save();
        Toastr::success('Successfully Saved :)' ,'Success');
        return redirect()->route('admin.section.create');
    }

    public function destroy($id)
    {
         Department::find($id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }

    public function edit($slug)
    {
         $cats=Department::where('slug',$slug)->first();;
         return view('admin.section.edit',['cats'=>$cats]);
    }

    public function update(Request $request){
        Department::where('id',$request->id)->update(['name'=>$request->name,'status'=>$request->status]);
        // DB::table('items')->where('cat_id',$request->id)->update(['cat_slug'=>Str::slug($request->name)]);
        Toastr::success('Successully Updated :)' ,'Success');
        return redirect('/admin/section')->with('message','Updated Successfully');
    }
}
