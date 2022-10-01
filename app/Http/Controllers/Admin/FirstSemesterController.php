<?php

namespace App\Http\Controllers\Admin;

use App\_exams_types;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Classinfo;
use App\Department;
use App\Semester;
use App\Subject;
use App\Exam;
use App\Exams;
use App\new_exam;
use Illuminate\Support\Str;
class FirstSemesterController extends Controller
{
    public function index(){
       $categories1 = Semester::all();
      $categories2 = Department::all();
      $categories3 = Classinfo::all();
      $categories=new_exam::orderBy('id','desc')->get();
      $subjects=Subject::all();
      $newExams1=new_exam::orderBy('id','desc')->get();
      $exam=_exams_types::all();

    return view('admin.exam.dplist',['newExams12'=>$newExams1,'categories'=>$categories,'categories1'=>$categories1,'categories2'=>$categories2,'categories3'=>$categories3,'subjects'=>$subjects,'exam'=>$exam]);

    }


    public function create(){
     $newExams1=new_exam::orderBy('id','desc')->get();
     $categories1 = Semester::all();
      $categories2 = Department::all();
      $categories3 = Classinfo::all();
      $categories=Exams::orderBy('id','desc')->get();
    

      $subjects=Subject::all();
     return view('admin.exam.add',['newExams12'=>$newExams1,'categories'=>$categories,'categories1'=>$categories1,'categories2'=>$categories2,'categories3'=>$categories3,'subjects'=>$subjects]);
    }


     public function store(Request $request)
    {


       $request->validate([
        'semester_id'=>'required',
        'department_id'=>'required',

        'subject_id'=>'required',
        'exam_name'=>'required',
        'exam_type'=>'required',
        'date'=>'required',
        'examiner_name'=>'required',
        'status'=>'required',
        ]);





        $post=new Exams();
        $post->semester_id=$request->semester_id;
        $post->department_id=$request->department_id;
        $post->section_id=$request->section_id;
        $post->subject_id=$request->subject_id;
        $post->exam_name=$request->exam_name;
        $post->exam_type=$request->exam_type;
        $post->date=$request->date;
        $post->examiner_name=$request->examiner_name;
        $post->status=$request->status;
        $post->save();

        Toastr::success('Successully Added :)' ,'Success');
        return redirect()->back();
    }

    public function info($id){
      $sectionId=Classinfo::where('id',$id)->value('section_name');
      $departmentId=Classinfo::where('id',$id)->value('semester_id');

      $departmentName=Department::where('id',$departmentId)->value('department_name');

      $semesterId=Classinfo::where('id',$id)->value('section_id');

      $semesterName=Semester::where('id',$semesterId)->value('semestername');

      $categories=Exams::where('section_id',$id)->get();
      $sections=Classinfo::orderBy('id','desc')->get();
      $categories1 = Semester::all();
      $subjects = Subject::all();
     return view('admin.exam.info',['categories'=>$categories,'sections'=>$sections,'categories1'=>$categories1,'sectionId'=>$sectionId,'departmentName'=>$departmentName,'semesterName'=>$semesterName,'semesterId'=>$semesterId,'subjects'=>$subjects]);
    }


    public function search(Request $request)
    {
        $newExams1=new_exam::orderBy('id','desc')->get();
        $exam_name = $request->input('exam_name');
        $semester = $request->input('s_id');
        $department = $request->input('d_id');
        $subject = $request->input('su_id');

        if($subject == 'all'){


          $categories=Exams::where('semester_id',$semester)
                    ->where('department_id',$department)
                    ->where('exam_name', 'like', '%'.$exam_name.'%')
                    ->get();


        }


        else{

            $categories=Exams::where('semester_id',$semester)
                        ->where('subject_id',$subject)
                        ->where('department_id',$department)
                        ->where('exam_name', 'like', '%'.$exam_name.'%')
                        ->get();

        }

        //$Mainfund = Transection::where('fund',$fund)->value('fund')
       $subjects=Subject::all();
         $categories2 = Department::all();
        $categories3 = Classinfo::all();
        $categories1 = Semester::all();
return view('admin.exam.search')->with(['newExams12'=>$newExams1,'categories'=>$categories,'categories1'=>$categories1,'categories2'=>$categories2,'categories3'=>$categories3,'subjects'=>$subjects]);
    }

    public function destroy($id)
    {
         Exams::find($id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }

    public function edit($id)
    {
        $newExams1=new_exam::orderBy('id','desc')->get();
         $categories2 = Department::all();
        $categories3 = Classinfo::all();
        $categories1 = Semester::all();
           $subjects=Subject::all();
         $cats=Exams::where('id',$id)->first();
         $exam=_exams_types::all();

         return view('admin.exam.edit',['newExams12'=>$newExams1,'cats'=>$cats,'exam'=>$exam,'categories1'=>$categories1,'categories2'=>$categories2,'categories3'=>$categories3,'subjects'=>$subjects]);
    }

    public function update(Request $request){
        Exams::where('id',$request->id)->update(['semester_id'=>$request->semester_id,'department_id'=>$request->department_id,'subject_id'=>$request->subject_id,'exam_name'=>$request->exam_name,'date'=>$request->date,'examiner_name'=>$request->examiner_name,'status'=>$request->status]);
        // DB::table('items')->where('cat_id',$request->id)->update(['cat_slug'=>Str::slug($request->name)]);
        Toastr::success('Successully Updated :)' ,'Success');
        return redirect('/admin/Semester/Exam')->with('message','Updated Successfully');
    }

    public function ename(Request $request)
    {

        new_exam::insert(
    ['exam_name' => $request->exam_name,'date' => $request->date,'status' => $request->status,'semester_id' => $request->semester_id]
);
Toastr::info('Successfull :)','Success');
         return redirect()->back();
    }




     public function destroyexam_list($id)
    {
        new_exam::where('id',$id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }

    public function editexam_list($id)
    {
        $categories1 = Semester::all();
         $cats=new_exam::where('id',$id)->first();
         return view('admin.exam.edit',['cats'=>$cats,'categories1'=>$categories1]);
    }

    public function updateexam_list(Request $request){
        new_exam::where('id',$request->id)->update(['date'=>$request->date,'exam_name'=>$request->exam_name,'status' => $request->status,'semester_id' => $request->semester_id]);
        // DB::table('items')->where('cat_id',$request->id)->update(['cat_slug'=>Str::slug($request->name)]);
        Toastr::success('Successully Updated :)' ,'Success');
        return redirect('/admin/Semester/Exam')->with('message','Updated Successfully');
    }

}
