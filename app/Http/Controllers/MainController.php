<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Classinfo;
use App\Student;
use App\Exam;
use App\Exams;
use App\new_exam;
use App\Subject;
use App\Result;
use App\Semester;
use Brian2694\Toastr\Facades\Toastr;

class MainController extends Controller
{
    public function index()
    {

        return view('admin.login');
    }

    public function findProductName(Request $request)
    {

        $data = Department::select('department_name', 'id')->where('semester_id', $request->id)->get();
        return response()->json($data);
    }

    public function findProductNamenew(Request $request)
    {

        $data = Subject::select('subject_name', 'id')->where('department_id', $request->id)->get();
        return response()->json($data);
    }

    public function findProductName1(Request $request)
    {

        $data = Classinfo::select('section_name', 'id')->where('section_id', $request->id)->get();
        return response()->json($data);
    }

    public function findProductName3(Request $request)
    {

        $data = Student::select('student_roll')->where('id', $request->id)->get();
        return response()->json($data);
    }

    public function findProductName40(Request $request)
    {

        $data = Subject::select('id', 'subject_name')->where('semester_id', $request->id)->get();
        return response()->json($data);
    }

    public function findProductName4(Request $request)
    {

        $data1 = Exam::where('subject_id', $request->id)->value('section_id');
        $data = Exam::select('id', 'exam_name')->where('section_id', $data1)->get();
        return response()->json($data);
    }


    public function about()
    {

        return view('front.about');
    }


    public function notice()
    {

        return view('front.notice');
    }


    public function admission()
    {

        return view('front.admission');
    }



    public function onlinelecture()
    {

        return view('front.onlinelecture');
    }

    public function contact()
    {

        return view('front.contact');
    }

    public function view()
    {
        $newExams12 = Exam::latest()->select('exam_name')->distinct('exam_name')->get();
        return view('front.view', ['newExams12' => $newExams12]);
    }



    public function viewr(Request $request)
    {

        $studentRollnew = $request->input('name');
        $ename = $request->input('exam_name');


        $newExam = $ename;

        $id = Student::where('student_roll', $studentRollnew)->value('id');

        $studentId = Student::where('id', $id)->value('id');
        $sectionId = Student::where('id', $id)->value('section_id');
        $sectionName = Classinfo::where('id', $sectionId)->value('section_name');


        $departmentId = Student::where('id', $id)->value('department_id');
        $departmentName = Department::where('id', $departmentId)->value('department_name');

        $semesterId = Student::where('id', $id)->value('semester_id');
        $semesterName = Semester::where('id', $semesterId)->value('semestername');

        $examIDs = Exam::where('section_id', $sectionId)->select('id', 'exam_name')->get();
        $examNames = Exam::where('department_id', $departmentId)->select('exam_name')->distinct()->get();

        $exams = Exam::where('semester_id', $semesterId)->where('department_id', $departmentId)->where('section_id', $sectionId)->get();


        $studentName = Student::where('id', $id)->value('student_name');
        $studentRoll = Student::where('id', $id)->value('student_roll');
        $mainResults = Result::where('students_id', $id)->where('exam_name', $ename)->get();
        $mainResults1 = Result::where('students_id', $id)->where('exam_name', $ename)->value('com');

        $subjectId = Exam::where('section_id', $sectionId)->value('subject_id');



        $categories = Result::where('students_id', $id)->where('exam_name', $ename)->get();


        $mainResults2 = Result::where('students_id', $id)->where('exam_name', $ename)->value('all_total');


        $subjectHeightMarks = Result::where('students_id', $id)->select('subject_id', 'hm', 'exam_name')->distinct('hm')->get();




        $subjects = Subject::all();
        $sections = Classinfo::orderBy('id', 'desc')->get();
        $categories1 = Semester::all();


        return view('admin.student.print', ['newExam' => $newExam, 'studentId' => $studentId, 'categories' => $categories, 'sections' => $sections, 'categories1' => $categories1, 'sectionName' => $sectionName, 'departmentName' => $departmentName, 'semesterName' => $semesterName, 'semesterId' => $semesterId, 'subjects' => $subjects, 'studentName' => $studentName, 'mainResults2' => $mainResults2, 'examNames' => $examNames, 'exams' => $exams, 'mainResults' => $mainResults, 'mainResults1' => $mainResults1, 'subjectHeightMarks' => $subjectHeightMarks, 'studentRoll' => $studentRoll]);
    }


    public function create()
    {

        $categories2 = Department::all();
        $categories3 = Classinfo::all();
        $categories1 = Semester::all();
        return view('front.add', ['categories2' => $categories2, 'categories3' => $categories3, 'categories1' => $categories1]);
    }

    protected function imageUpload($request)
    {
        $productImage = $request->file('student_image');
        $imageName = $productImage->getClientOriginalName();
        $directory = 'public/uploads/';
        $imageUrl = $directory . $imageName;

        Image::make($productImage)->resize(400, 400)->save($imageUrl);

        return $imageUrl;
    }

    public function store(Request $request)
    {


        $request->validate([
            'semester_id' => 'required',
            'department_id' => 'required',
            'section_id' => 'required',
            'student_name' => 'required',


            'student_roll' => 'required',

        ]);

        if ($request->file('student_image') !== null) {
            $image = $this->imageUpload($request);
        } else {
            $image = null;
        }



        $post = new Student;
        $post->semester_id = $request->semester_id;
        $post->department_id = $request->department_id;
        $post->section_id = $request->section_id;
        $post->student_name = $request->student_name;
        $post->student_dob = $request->student_dob;
        $post->student_phone = $request->student_phone;
        $post->student_email = $request->student_email;
        $post->student_roll = $request->student_roll;
        $post->student_address = $request->student_address;
        $post->status = $request->status;
        $post->date = date('d-m-Y');
        $post->student_image = $image;
        $post->save();

        Toastr::success('Successully Added :)', 'Success');
        return redirect()->back();
    }
    public function student(Request $request)
    {

        return view('student.view');
    }
    public function searching(Request $request)
    {
        $roll        = $request->input('roll');
        $categories = Student::where('student_roll', $roll )->get();

        return view('student.search', compact('categories'));
    }
    public function student_exam_wise_result($id){

        $newExams1=new_exam::orderBy('id','desc')->get();
        $students = Student::where('id',$id)->first();
        return view('student.page',['newExams1'=>$newExams1,'students'=>$students]);
    }
    public function result($e_id, $s_id)
    {
        $subjects       = Subject::all();
        $categories1    = Semester::all();
        $studentName    = Student::where('id', $s_id)->value('student_name');
        $studentRoll    = Student::where('id', $s_id)->value('student_roll');
        $newExam        = new_exam::where('id', $e_id)->value('exam_name');
        $sections       = Classinfo::orderBy('id', 'desc')->get();
        $studentId      = Student::where('id', $s_id)->value('id');
        $sectionId      = Student::where('id', $s_id)->value('section_id');
        $subjectId      = Exams::where('section_id', $sectionId)->value('subject_id');
        $sectionName    = Classinfo::where('id', $sectionId)->value('section_name');
        $departmentId   = Student::where('id', $s_id)->value('department_id');
        $departmentName = Department::where('id', $departmentId)->value('department_name');
        $semesterId     = Student::where('id', $s_id)->value('semester_id');
        $semesterName   = Semester::where('id', $semesterId)->value('semestername');

        $examIDs  = Exams::where('section_id', $sectionId)
            ->select('id', 'exam_name')
            ->get();

        $examNames = Exams::where('department_id', $departmentId)
            ->select('exam_name')
            ->distinct()
            ->get();

        $exams = Exams::where('semester_id', $semesterId)
            ->where('department_id', $departmentId)
            ->where('section_id', $sectionId)
            ->get();

        $mainResults = Result::where('students_id', $s_id)
            ->where('exam_id', $e_id)
            ->get();

        $mainResults1 = Result::where('students_id', $s_id)
            ->where('exam_id', $e_id)
            ->value('com');

        $categories = Result::where('students_id', $s_id)
            ->where('exam_id', $e_id)
            ->get();

        $mainResults2 = Result::where('students_id', $s_id)
            ->where('exam_id', $e_id)
            ->value('main_total');


        $subjectHeightMarks = Result::where('students_id', $s_id)
            ->where('exam_id', $e_id)
            ->select('subject_id', 'highest_mark', 'exam_id')
            ->distinct('highest_mark')
            ->get();

        $categories3 = Result::where('students_id', $s_id)
            ->where('exam_id', $e_id)
            ->sum('written_exam');
        $categories2 = Result::where('students_id', $s_id)
            ->where('exam_id', $e_id)
            ->sum('mcq_exam');

        $grade_point_total = Result::where('students_id', $s_id)
            ->where('exam_id', $e_id)
            ->sum('gradePoint');
        $grade_point_sub_count = Result::where('students_id', $s_id)
            ->where('exam_id', $e_id)
            ->count('subject_id');

        //dd($grade_point_total);

        if ($departmentId == 1) {
            $newGrade1 = $grade_point_total / 9;
        } else {

            $newGrade1 = $grade_point_total / 8;
        }
        $newGrade = number_format($newGrade1, 2);

        $mainResults23 = Result::where('students_id', $s_id)
            ->where('exam_id', $e_id)
            ->value('all_total');

        $mainResultsnew = Result::where('students_id', $s_id)
            ->where('exam_id', $e_id)
            ->value('fail_sub');

        return view(
            'student.result',
            [
                'mainResultsnew'     => $mainResultsnew,
                'newGrade'           => $newGrade,
                'newExam'            => $newExam,
                'studentId'          => $studentId,
                'categories'         => $categories,
                'categories3'        => $categories3,
                'categories2'        => $categories2,
                'sections'           => $sections,
                'categories1'        => $categories1,
                'sectionName'        => $sectionName,
                'departmentName'     => $departmentName,
                'semesterName'       => $semesterName,
                'semesterId'         => $semesterId,
                'subjects'           => $subjects,
                'studentName'        => $studentName,
                'mainResults2'       => $mainResults2,
                'examNames'          => $examNames,
                'exams'              => $exams,
                'mainResults'        => $mainResults,
                'mainResults1'       => $mainResults1,
                'subjectHeightMarks' => $subjectHeightMarks,
                'studentRoll'        => $studentRoll,
                'mainResults23'      => $mainResults23,

            ]
        );
    }
}
