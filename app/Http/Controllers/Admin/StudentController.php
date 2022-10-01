<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Intervention\Image\Facades\Image;
use App\Department;
use App\Semester;
use App\Subject;
use App\Student;
use App\Classinfo;
use App\Result;
use App\Retake;
use App\Exams;
use App\new_exam;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Str;


class StudentController extends Controller
{
    public function index()
    {
        $categories2 = Department::all();
        $categories3 = Classinfo::all();
        $categories  = Student::orderBy('id', 'desc')->get();
        $categories1 = Semester::all();

        return view(
            'admin.student.manage',
            [
                'categories'  => $categories,
                'categories1' => $categories1,
                'categories2' => $categories2,
                'categories3' => $categories3
            ]
        );
    }

    public function research(Request $request)
    {
        $categories = Student::where('student_name', 'like', '%' . $request->research . '%')->get();
        return view('admin.student.search', compact('categories'));
    }

    public function create()
    {

        $categories2 = Department::all();
        $categories3 = Classinfo::all();
        $categories1 = Semester::all();

        return view(
            'admin.student.add',
            [
                'categories2' => $categories2,
                'categories3' => $categories3,
                'categories1' => $categories1
            ]
        );
    }

    protected function imageUpload($request)
    {
        $productImage = $request->file('student_image');
        $imageName    = $productImage->getClientOriginalName();
        $directory    = 'public/uploads/';
        $imageUrl     = $directory . $imageName;

        Image::make($productImage)->resize(400, 400)->save($imageUrl);

        return $imageUrl;
    }

    public function store(Request $request)
    {
        $request->validate([
            'semester_id'   => 'required',
            'department_id' => 'required',
            'section_id'    => 'required',
            'student_name'  => 'required',
            'student_roll'  => 'required',
        ]);

        if ($request->file('student_image') !== null) {
            $image = $this->imageUpload($request);
        } else {
            $image = null;
        }

        $post = new Student;
        $post->semester_id     = $request->semester_id;
        $post->department_id   = $request->department_id;
        $post->section_id      = $request->section_id;
        $post->student_name    = $request->student_name;
        $post->student_dob     = $request->student_dob;
        $post->student_phone   = $request->student_phone;
        $post->student_email   = $request->student_email;
        $post->student_roll    = $request->student_roll;
        $post->student_address = $request->student_address;
        $post->status          = $request->status;
        $post->student_image   = $image;
        $post->save();

        Toastr::success('Successully Added :)', 'Success');
        return redirect()->back();
    }

    public function info($id)
    {
        $categories1    = Semester::all();
        $categories     = Student::where('section_id', $id)->get();
        $sections       = Classinfo::orderBy('id', 'desc')->get();
        $sectionId      = Classinfo::where('id', $id)->value('section_name');
        $departmentId   = Classinfo::where('id', $id)->value('semester_id');
        $departmentName = Department::where('id', $departmentId)->value('department_name');
        $semesterId     = Classinfo::where('id', $id)->value('section_id');
        $semesterName   = Semester::where('id', $semesterId)->value('semestername');

        return view(
            'admin.student.info',
            [
                'categories'     => $categories,
                'sections'       => $sections,
                'categories1'    => $categories1,
                'sectionId'      => $sectionId,
                'departmentName' => $departmentName,
                'semesterName'   => $semesterName,
                'semesterId'     => $semesterId
            ]
        );
    }

    public function result($eid, $sid)
    {
        $subjects       = Subject::all();
        $categories1    = Semester::all();
        $sections       = Classinfo::orderBy('id', 'desc')->get();
        $newExamName    = new_exam::where('id', $eid)->get();
        $categories     = Result::where('students_id', $sid)->get();
        $studentId      = Student::where('id', $sid)->value('id');
        $sectionId      = Student::where('id', $sid)->value('section_id');
        $studentName    = Student::where('id', $sid)->value('student_name');
        $studentRoll    = Student::where('id', $sid)->value('student_roll');
        $subjectId      = Exams::where('section_id', $sectionId)->value('subject_id');
        $sectionName    = Classinfo::where('id', $sectionId)->value('section_name');
        $departmentId   = Student::where('id', $sid)->value('department_id');
        $departmentName = Department::where('id', $departmentId)->value('department_name');
        $semesterId     = Student::where('id', $sid)->value('semester_id');
        $semesterName   = Semester::where('id', $semesterId)->value('semestername');

        $examIDs = Exams::where('section_id', $sectionId)
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

        $mainResults = Result::where('students_id', $sid)
            ->where('exam_id', $eid)
            ->get();

        $mainResults1 = Result::where('students_id', $sid)
            ->where('exam_id', $eid)
            ->select('exam_name', 'com')
            ->distinct('com')
            ->get();

        $mainResultsnew = Result::where('students_id', $sid)
            ->where('exam_id', $eid)
            ->value('fail_sub');

        $categories3 = Result::where('students_id', $sid)
            ->where('exam_id', $eid)
            ->sum('main_total');

        $categories2 = Result::where('students_id', $sid)
            ->where('exam_id', $eid)
            ->sum('mcq_exam');

        $categories4 = Result::where('students_id', $sid)
            ->where('exam_id', $eid)
            ->sum('mcq_exam');

        $grade_point_total = Result::where('students_id', $sid)
            ->where('exam_id', $eid)
            ->sum('gradePoint');

        $grade_point_sub_count = Result::where('students_id', $sid)
            ->where('exam_id', $eid)
            ->count('subject_id');

        if ($departmentId == 1) {
            $newGrade1 = $grade_point_total / 9;
        } else {

            $newGrade1 = $grade_point_total / 8;
        }
        $newGrade = number_format($newGrade1, 2);

        $mainResults2 = Result::where('students_id', $sid)
            ->where('exam_id', $eid)
            ->select('exam_name', 'all_total')
            ->distinct('all_total')
            ->get();

        $subjectHeightMarks = Result::where('students_id', $sid)
            ->where('exam_id', $eid)
            ->select('subject_id', 'highest_mark', 'exam_id')
            ->distinct('highest_mark')
            ->get();

        $mainResults23 = Result::where('students_id', $sid)
            ->where('exam_id', $eid)
            ->value('all_total');

        return view(
            'admin.student.result',
            [
                'mainResultsnew'     => $mainResultsnew,
                'newGrade'           => $newGrade,
                'categories2'        => $categories2,
                'categories3'        => $categories3,
                'studentId'          => $studentId,
                'categories'         => $categories,
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
                'newExamName'        => $newExamName,
                'categories4'        => $categories4,
                'mainResults23'      => $mainResults23
            ]
        );
    }


    public function destroy($id)
    {
        Student::find($id)->delete();
        Toastr::warning('Successfully Deleted :)', 'Success');
        return redirect()->back();
    }
    public function search(Request $request)
    {
        $categories2 = Department::all();
        $categories3 = Classinfo::all();
        $categories1 = Semester::all();
        $roll        = $request->input('roll');
        $semester    = $request->input('s_id');
        $department  = $request->input('d_id');
        $section     = $request->input('se_id');

        if ($section == 'all') {

            $categories = Student::where('semester_id', $semester)
                ->where('department_id', $department)
                ->get();
        } else {

            $categories = Student::where('semester_id', $semester)
                ->where('department_id', $department)
                ->where('section_id', $section)
                ->where('student_roll', 'like', '%' . $roll . '%')
                ->get();
        }



        return view('admin.student.search')->with(['categories' => $categories, 'categories1' => $categories1, 'categories2' => $categories2, 'categories3' => $categories3]);
    }


    public function edit($id)
    {
        $categories2 = Department::all();
        $categories3 = Classinfo::all();
        $categories1 = Semester::all();
        $category4   = Student::find($id);

        return view('admin.student.edit')->with(
            [
                'category4'   => $category4,
                'categories1' => $categories1,
                'categories2' => $categories2,
                'categories3' => $categories3
            ]
        );
    }


    public function update(Request $request)
    {
        $productImage = $request->file('student_image');
        if ($productImage) {
            $post = Student::find($request->id);
            unlink($post->student_image);
            $imageUrl = $this->imageUpload($request);
            $this->productInfoUpdate($post, $request, $imageUrl);

            Toastr::success('Successfully Updated :)', 'Success');
            return redirect()->route('admin.student');
        } else {

            $post                  = Student::find($request->id);
            $post->semester_id     = $request->semester_id;
            $post->department_id   = $request->department_id;
            $post->section_id      = $request->section_id;
            $post->student_name    = $request->student_name;
            $post->student_dob     = $request->student_dob;
            $post->student_phone   = $request->student_phone;
            $post->student_email   = $request->student_email;
            $post->student_roll    = $request->student_roll;
            $post->student_address = $request->student_address;
            $post->status          = $request->status;
            $post->save();

            Toastr::success('Successfully Updated :)', 'Success');
            return redirect()->route('admin.student');
        }
    }

    public function resultprint($id, $ename)
    {
        $newExam        = $ename;
        $subjects       = Subject::all();
        $categories1    = Semester::all();
        $sections       = Classinfo::orderBy('id', 'desc')->get();
        $studentId      = Student::where('id', $id)->value('id');
        $sectionId      = Student::where('id', $id)->value('section_id');
        $subjectId      = Exams::where('section_id', $sectionId)->value('subject_id');
        $sectionName    = Classinfo::where('id', $sectionId)->value('section_name');
        $studentName    = Student::where('id', $id)->value('student_name');
        $studentRoll    = Student::where('id', $id)->value('student_roll');
        $departmentId   = Student::where('id', $id)->value('department_id');
        $departmentName = Department::where('id', $departmentId)->value('department_name');
        $semesterId     = Student::where('id', $id)->value('semester_id');
        $semesterName   = Semester::where('id', $semesterId)->value('semestername');

        $examIDs = Exams::where('section_id', $sectionId)
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

        $mainResults = Result::where('students_id', $id)
            ->where('exam_name', $ename)
            ->get();

        $mainResults1 = Result::where('students_id', $id)
            ->where('exam_name', $ename)
            ->value('com');

        $categories = Result::where('students_id', $id)
            ->where('exam_name', $ename)
            ->get();

        $mainResults2 = Result::where('students_id', $id)
            ->where('exam_name', $ename)
            ->value('all_total');

        $subjectHeightMarks = Result::where('students_id', $id)
            ->select('subject_id', 'hm', 'exam_name')
            ->distinct('hm')
            ->get();

        $pdf = PDF::loadView(
            'admin.result.print',
            [
            'mainResultsnew'     => $mainResults,
            'newExam'            => $newExam,
            'studentId'          => $studentId,
            'categories'         => $categories,
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
            'studentRoll'        => $studentRoll
            ]
        );

        return $pdf->download('Result_Sheet.pdf');
    }

    public function resultprintview($id, $ename)
    {
        $newExam1       = $ename;
        $subjects       = Subject::all();
        $categories1    = Semester::all();
        $studentName    = Student::where('id', $id)->value('student_name');
        $studentRoll    = Student::where('id', $id)->value('student_roll');
        $newExam        = new_exam::where('exam_name', $newExam1)->value('id');
        $sections       = Classinfo::orderBy('id', 'desc')->get();
        $studentId      = Student::where('id', $id)->value('id');
        $sectionId      = Student::where('id', $id)->value('section_id');
        $subjectId      = Exams::where('section_id', $sectionId)->value('subject_id');
        $sectionName    = Classinfo::where('id', $sectionId)->value('section_name');
        $departmentId   = Student::where('id', $id)->value('department_id');
        $departmentName = Department::where('id', $departmentId)->value('department_name');
        $semesterId     = Student::where('id', $id)->value('semester_id');
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

        $mainResults = Result::where('students_id', $id)
            ->where('exam_id', $newExam)
            ->get();

        $mainResults1 = Result::where('students_id', $id)
            ->where('exam_id', $newExam)
            ->value('com');

        $categories = Result::where('students_id', $id)
            ->where('exam_id', $newExam)
            ->get();

        $mainResults2 = Result::where('students_id', $id)
            ->where('exam_id', $newExam)
            ->value('main_total');


        $subjectHeightMarks = Result::where('students_id', $id)
            ->where('exam_id', $newExam)
            ->select('subject_id', 'highest_mark', 'exam_id')
            ->distinct('highest_mark')
            ->get();

        $categories3 = Result::where('students_id', $id)
            ->where('exam_id', $newExam)
            ->sum('written_exam');
        $categories2 = Result::where('students_id', $id)
            ->where('exam_id', $newExam)
            ->sum('mcq_exam');

        $grade_point_total = Result::where('students_id', $id)
            ->where('exam_id', $newExam)
            ->sum('gradePoint');
        $grade_point_sub_count = Result::where('students_id', $id)
            ->where('exam_id', $newExam)
            ->count('subject_id');

        //dd($grade_point_total);

        if ($departmentId == 1) {
            $newGrade1 = $grade_point_total / 9;
        } else {

            $newGrade1 = $grade_point_total / 8;
        }
        $newGrade = number_format($newGrade1, 2);

        $mainResults23 = Result::where('students_id', $id)
            ->where('exam_id', $newExam)
            ->value('all_total');

        $mainResultsnew = Result::where('students_id', $id)
            ->where('exam_id', $newExam)
            ->value('fail_sub');

        return view(
            'admin.student.print',
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
                'newExam1'           => $newExam1
            ]
        );
    }
    public function exam_wise_result($id){

        $newExams1=new_exam::orderBy('id','desc')->get();
        $students = Student::where('id',$id)->first();
        return view('admin.student.newpageexam',['newExams1'=>$newExams1,'students'=>$students]);


    }
}
