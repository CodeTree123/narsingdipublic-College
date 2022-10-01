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
use App\Classinfo;
use App\User;
use App\Teacher;
use App\Teachersubdetail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
     public function index(){


       $teacher=Teacher::all();

    return view('admin.teacher.dplist',['teacher'=>$teacher]);

    }


     public function create(){

      $teacher = Teacher::all();
     return view('admin.teacher.add',['teacher'=>$teacher]);
    }


     public function store(Request $request)
    {


       $request->validate([

        'name'=>'required',
'department_id'=>'required',
'section_id'=>'required',
'subject_id'=>'required',
'designation'=>'required',
'phone'=>'required',
'address'=>'required',
'email'=>'nullable',

        ]);





        $post=new Teacher;
        $post->name=$request->name;
        $post->department_id=$request->department_id;
        $post->section_id=$request->section_id;
        $post->subject_id=$request->subject_id;
        $post->designation=$request->designation;
        $post->email=$request->email;
        $post->address=$request->address;
        $post->phone=$request->phone;
        $post->save();
        Toastr::success('Successully Added :)' ,'Success');
        return redirect()->back();
    }



      public function infoadd($id){
        $categories1 = Semester::all();
        $categories2 = Department::all();
        $categories3 = Classinfo::all();
        $teacher_Name = Teacher::where('id',$id)->value('name');
        $teacher_ID = Teacher::where('id',$id)->value('id');
        $desi_Name = Teacher::where('id',$id)->value('desi');
     return view('admin.teacher.addsub',['teacher_Name'=>$teacher_Name,'categories1'=>$categories1,'categories2'=>$categories2,'categories3'=>$categories3,'desi_Name'=>$desi_Name,'teacher_ID'=>$teacher_ID]);
    }


     public function infostore(Request $request)
    {

        $post=new Teachersubdetail;
        $post->user_id=$request->user_id;
        $post->subject_id=$request->subject_id;
        $post->semester_id=$request->semester_id;
        $post->department_id=$request->department_id;
        $post->section_id=$request->section_id;
        $post->save();

        Toastr::success('Successully Added :)' ,'Success');
        return redirect()->back();

    }

    public function infoview($id){
     $categories1 = Semester::all();
     $categories2 = Department::all();
     $categories3 = Classinfo::all();
      $categories4 = Subject::all();
     $teacher_Names = Teachersubdetail::where('user_id',$id)->get();
     $department_ids = Teacher::where('id',$id)->value('name');

     return view('admin.teacher.viewsub',['categories4'=>$categories4,'teacher_Names'=>$teacher_Names,'categories1'=>$categories1,'categories2'=>$categories2,'categories3'=>$categories3,'department_ids'=>$department_ids]);



    }

    public function edit($id){

        $teacher=Teacher::find($id);

        return view('admin.teacher.edit',['teacher'=>$teacher]);
    }

    public function update(Request $request){


         $post=Teacher::find($request->id);
        $post->desi=$request->desi;
        $post->name=$request->name;
        $post->department_name=$request->department_name;
        $post->phone=$request->phone;
        $post->email=$request->email;
        $post->address=$request->address;
        $post->password=Hash::make($request->password);
        $post->view_password=$request->password;
        $post->save();

        $Password=$post->password;
        $ID=$post->id;

         $updatev =User::where('username',$ID)->update(['name'=>$request->name,'phone'=>$request->phone,'email'=>$request->email,'email'=>$Password]);

        // $user=User::find($ID);
        // $user->name=$request->name;
        // $user->role_id=2;
        // $user->phone=$request->phone;
        // $user->email=$request->email;
        // $user->email=$Password;
        // $user->save();

        Toastr::success('Successully Added :)' ,'Success');
        return redirect('/admin/teacher');


    }

    public function destroy($id)
    {
         Teacher::find($id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }

    public function search(Request $request){

        $dName=$request->input('s_id');

        $dNames=Teacher::select('department_id')->get();
        $sResult = Teacher::where('department_name',$dName)->get();
        return view('admin.teacher.search',['sResult'=>$sResult,'dNames'=>$dNames,'dName'=>$dName]);
    }
}
