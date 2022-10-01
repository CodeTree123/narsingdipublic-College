<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Semester;
use Illuminate\Support\Str;
class SemesterController extends Controller
{
    public function index(){
       $categories=Semester::orderBy('id','asc')->get();
       $categories1 = Semester::all();
    	return view('admin.semester.manage',['categories'=>$categories,'categories1'=>$categories1]);
    }

    public function create(){
        $categories1 = Semester::all();
     return view('admin.semester.add',['categories1'=>$categories1]);
    }

     public function store(Request $request)
    {
       $this->validate($request,[
            'semestername' => 'required'

        ]);
        $category = new Semester();
        $category->semestername = $request->semestername;
        //$category->slug =Str::slug($request->name);
        $category->status = $request->status;
        $category->save();
        Toastr::success('Successfully Saved :)' ,'Success');
        return redirect()->route('admin.semester.create');
    }

    public function destroy($id)
    {
         Semester::find($id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }

    public function edit($slug)
    {
         $cats=Semester::where('id',$slug)->first();;
         return view('admin.semester.edit',['cats'=>$cats]);
    }

    public function update(Request $request){
        Semester::where('id',$request->id)->update(['semestername'=>$request->semestername,'status'=>$request->status]);
        // DB::table('items')->where('cat_id',$request->id)->update(['cat_slug'=>Str::slug($request->name)]);
        Toastr::success('Successully Updated :)' ,'Success');
        return redirect('/admin/semester')->with('message','Updated Successfully');
    }
}
