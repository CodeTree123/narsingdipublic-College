<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Classinfo;
use App\Department;
use App\Semester;
use App\Subject;
use App\Exam;
use App\Result;

use App\Student;
use App\Totalmark;
use App\Hmark;
use App\new_exam;
use Illuminate\Support\Str;

class NewResultController extends Controller
{
    public function index($eid, $sid)
    {
        $sectionNames    = Classinfo::all();
        $departmentNames = Department::all();
        $subjectsName    = Subject::all();
        $semesterName    = Semester::where('id', $sid)->value('semestername');
        $examNames       = new_exam::where('id', $eid)->value('exam_name');
        $examid          = $eid;
        $semester_id     = $sid;

        return view(
            'admin.newResult.list',
            [
                'sectionNames' => $sectionNames,
                'departmentNames' => $departmentNames,
                'subjectsName' => $subjectsName,
                'semesterName' => $semesterName,
                'examNames' => $examNames,
                'examid' => $examid,
                'semester_id' => $semester_id
            ]
        );
    }


    public function selectSubcategory(Request $request)
    {
        $subcategory = Classinfo::where('section_id', $request->catId)->get();
        return response()->json($subcategory);
    }


    public function search_subject_deparment(Request $request)
    {
        $semester_id = $request->semester_id;
        $exam_id = $request->exam_id;
        $depId = $request->d_id;
        $sec_id = $request->sec_id;

        //dd($sec_id);

        if ($sec_id == Null) {

            Toastr::error('Please select The Section :)', 'error');
            return redirect()->back();
        } else {

            $semesterName = Semester::where('id', $semester_id)->value('semestername');
            $examName = new_exam::where('id', $exam_id)->value('exam_name');
            $departmentName = Department::where('id', $depId)->value('department_name');
            $sectionName = Classinfo::where('id', $sec_id)->value('section_name');

            $subjects = Subject::where('department_id', $depId)->get();

            return view('admin.newResult.list1', ['sectionName' => $sectionName, 'departmentName' => $departmentName, 'subjects' => $subjects, 'semesterName' => $semesterName, 'examName' => $examName, 'exam_id' => $exam_id, 'semester_id' => $semester_id, 'depId' => $depId, 'sec_id' => $sec_id]);
        }
    }


    public function search_subject_deparment_add_result(Request $request)
    {




        $semester_id = $request->semester_id;
        $exam_id = $request->exam_id;
        $depId = $request->department_id;
        $sec_id = $request->section_id;
        $Sub_id = $request->subject_id;



        $semesterName = Semester::where('id', $semester_id)->value('semestername');
        $examName = new_exam::where('id', $exam_id)->value('exam_name');
        $departmentName = Department::where('id', $depId)->value('department_name');
        $sectionName = Classinfo::where('id', $sec_id)->value('section_name');
        $subjectName = Subject::where('id', $Sub_id)->value('subject_name');



        return view(
            'admin.newResult.list2',
            [
                'sectionName' => $sectionName, 'departmentName' => $departmentName, 'subjectName' => $subjectName, 'semesterName' => $semesterName, 'examName' => $examName, 'exam_id' => $exam_id, 'semester_id' => $semester_id, 'depId' => $depId, 'sec_id' => $sec_id, 'Sub_id' => $Sub_id,
            ]
        );
    }

    public function new_result_list($id)
    {
        $results  = Result::where('exam_id', $id)->latest()->get();
        $examName = new_exam::where('id', $id)->value('exam_name');
        $examId   = $id;
        return view('admin.newResult.list3', ['results' => $results, 'examName' => $examName, 'examId' => $examId]);
    }
}
