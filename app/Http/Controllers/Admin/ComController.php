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
use App\Exams;
use App\new_exam;
use App\Result;
use App\Student;
use Illuminate\Support\Str;

class ComController extends Controller
{
    public function index()
    {
        $categories2 = Department::all();
        $categories3 = Classinfo::all();
        $categories1 = Semester::all();
        $newExams1   = new_exam::orderBy('id', 'desc')->get();
        $categories  = Classinfo::orderBy('id', 'asc')->get();
        return view(
            'admin.combined.dplist',
            [
                'newExams1'   => $newExams1,
                'categories1' => $categories1,
                'categories'  => $categories,
                'categories2' => $categories2,
                'categories3' => $categories3
            ]
        );
    }

    public function section($sid, $id)
    {
        $department_id   = $id;
        $semester_id     = $sid;
        $department_name = Department::where('id', $department_id)->value('department_name');
        $semester_name   = Semester::where('id', $semester_id)->value('semestername');
        $examNamenew     = new_exam::where('id', $semester_id)->value('exam_name');

        if ($department_id == 3) {

            //Pass Student
            $resultDetailPass = Result::whereIn('section_id', [9])
                ->where('department_id', $department_id)
                ->where('exam_id', $semester_id)
                ->where('fail_sub', 0)
                ->select('roll', 'all_total', 'students_id', 'section_id')
                ->distinct()
                ->orderBy('all_total', 'desc')
                ->get();

            //Fail Student
            $resultDetailFailed = Result::whereIn('section_id', [9])
                ->where('department_id', $department_id)->where('exam_id', $semester_id)
                ->where('fail_sub', '>', 0)
                ->select('roll', 'all_total', 'students_id', 'section_id', 'fail_sub')
                ->distinct()
                ->orderBy('fail_sub', 'asc')
                ->orderBy('all_total', 'desc')
                ->get();

            $sectionNames = Classinfo::whereIn('section_id', [9])->get();
        } elseif ($department_id == 1) {

            //Pass Student
            $resultDetailPass = Result::whereIn('section_id', [1, 2, 3, 4, 5])
                ->where('department_id', $department_id)
                ->where('exam_id', $semester_id)
                ->where('fail_sub', 0)
                ->select('roll', 'all_total', 'students_id', 'section_id')
                ->distinct()
                ->orderBy('all_total', 'desc')
                ->get();

            //Fail Student
            $resultDetailFailed = Result::whereIn('section_id', [1, 2, 3, 4, 5])
                ->where('department_id', $department_id)
                ->where('exam_id', $semester_id)
                ->where('fail_sub', '>', 0)
                ->select('roll', 'all_total', 'students_id', 'section_id', 'fail_sub')
                ->distinct()
                ->orderBy('fail_sub', 'asc')
                ->orderBy('all_total', 'desc')
                ->get();

            $sectionNames = Classinfo::whereIn('id', [1, 2, 3, 4, 5])->get();
        } elseif ($department_id == 2) {

            //Pass Student
            $resultDetailPass = Result::whereIn('section_id', [6, 7, 8])
                ->where('department_id', $department_id)
                ->where('exam_id', $semester_id)
                ->where('fail_sub', 0)
                ->select('roll', 'all_total', 'students_id', 'section_id')
                ->distinct()
                ->orderBy('all_total', 'desc')
                ->get();

            //Fail Student
            $resultDetailFailed = Result::whereIn('section_id', [6, 7, 8])
                ->where('department_id', $department_id)
                ->where('exam_id', $semester_id)
                ->where('fail_sub', '>', 0)
                ->select('roll', 'all_total', 'students_id', 'section_id', 'fail_sub')
                ->distinct()
                ->orderBy('fail_sub', 'asc')
                ->orderBy('all_total', 'desc')
                ->get();

            $sectionNames = Classinfo::whereIn('id', [6, 7, 8])->get();
        }
        $studentNames = Student::latest()->get();

        return view('admin.combined.new')->with([
            'examNamenew'        => $examNamenew,
            'semester_id'        => $semester_id,
            'department_id'      => $department_id,
            'resultDetailPass'   => $resultDetailPass,
            'resultDetailFailed' => $resultDetailFailed,
            'sectionNames'       => $sectionNames,
            'studentNames'       => $studentNames,
            'department_name'    => $department_name,
            'semester_name'      => $semester_name
        ]);
    }

    public function update(Request $request)
    {
        $roll     = $request->input('roll');
        $mark     = $request->input('total_mark');
        $gpa      = $request->input('gradePoint');

        $affected = Result::where('roll', $roll)
            ->update([
                'all_total' => $mark,
                'com'      => $gpa
            ]);

        return redirect()->back();
    }

    public function sectionpass($sid, $id)
    {
        $department_id    = $id;
        $semester_id      = $sid;
        $department_name  = Department::where('id', $department_id)->value('department_name');
        $semester_name    = Semester::where('id', $semester_id)->value('semestername');
        $examNamenew      = new_exam::where('id', $semester_id)->value('exam_name');

        if ($department_id == 3) {

            //Pass Student
            $resultDetailPass = Result::whereIn('section_id', [9])
                ->where('department_id', $department_id)
                ->where('exam_id', $semester_id)
                ->where('fail_sub', 0)
                ->select('roll', 'all_total', 'students_id', 'section_id')
                ->distinct()
                ->orderBy('all_total', 'desc')
                ->get();

            $sectionNames = Classinfo::whereIn('section_id', [9])->get();
        } elseif ($department_id == 1) {

            //Pass Student
            $resultDetailPass = Result::whereIn('section_id', [1, 2, 3, 4, 5])
                ->where('department_id', $department_id)
                ->where('exam_id', $semester_id)
                ->where('fail_sub', 0)
                ->select('roll', 'all_total', 'students_id', 'section_id')
                ->distinct()
                ->orderBy('all_total', 'desc')
                ->get();

            $sectionNames = Classinfo::whereIn('id', [1, 2, 3, 4, 5])->get();
        } elseif ($department_id == 2) {

            //Pass Student
            $resultDetailPass = Result::whereIn('section_id', [6, 7, 8])
                ->where('department_id', $department_id)
                ->where('exam_id', $semester_id)
                ->where('fail_sub', 0)
                ->select('roll', 'all_total', 'students_id', 'section_id')
                ->distinct()
                ->orderBy('all_total', 'desc')
                ->get();

            $sectionNames = Classinfo::whereIn('id', [6, 7, 8])->get();
        }
        $studentNames = Student::latest()->get();

        return view('admin.combined.pass')->with([
            'semester_id'      => $semester_id,
            'department_id'    => $department_id,
            'resultDetailPass' => $resultDetailPass,
            'sectionNames'     => $sectionNames,
            'studentNames'     => $studentNames,
            'department_name'  => $department_name,
            'semester_name'    => $semester_name,
            'examNamenew'      => $examNamenew
        ]);
    }

    public function sectionfail($sid, $id)
    {
        $department_id     = $id;
        $semester_id       = $sid;
        $department_name   = Department::where('id', $department_id)->value('department_name');
        $semester_name     = Semester::where('id', $semester_id)->value('semestername');
        $examNamenew       = new_exam::where('id', $semester_id)->value('exam_name');

        if ($department_id == 3) {

            //Fail Student
            $resultDetailFailed = Result::whereIn('section_id', [9])
                ->where('department_id', $department_id)
                ->where('exam_id', $semester_id)
                ->where('fail_sub', '>', 0)
                ->select('roll', 'all_total', 'students_id', 'section_id', 'fail_sub')
                ->distinct()
                ->orderBy('fail_sub', 'asc')
                ->orderBy('all_total', 'desc')
                ->get();

            $sectionNames = Classinfo::whereIn('section_id', [9])->get();
        } elseif ($department_id == 1) {

            //Fail Student
            $resultDetailFailed = Result::whereIn('section_id', [1, 2, 3, 4, 5])
                ->where('department_id', $department_id)
                ->where('exam_id', $semester_id)
                ->where('fail_sub', '>', 0)
                ->select('roll', 'all_total', 'students_id', 'section_id', 'fail_sub')
                ->distinct()
                ->orderBy('fail_sub', 'asc')
                ->orderBy('all_total', 'desc')
                ->get();

            $sectionNames = Classinfo::whereIn('id', [1, 2, 3, 4, 5])->get();
        } elseif ($department_id == 2) {

            //Fail Student
            $resultDetailFailed = Result::whereIn('section_id', [6, 7, 8])
                ->where('department_id', $department_id)
                ->where('exam_id', $semester_id)
                ->where('fail_sub', '>', 0)
                ->select('roll', 'all_total', 'students_id', 'section_id', 'fail_sub')
                ->distinct()
                ->orderBy('fail_sub', 'asc')
                ->orderBy('all_total', 'desc')
                ->get();

            $sectionNames = Classinfo::whereIn('id', [6, 7, 8])->get();
        }
        $studentNames = Student::latest()->get();

        return view('admin.combined.fail')->with([
            'semester_id'        => $semester_id,
            'department_id'      => $department_id,
            'resultDetailFailed' => $resultDetailFailed,
            'sectionNames'       => $sectionNames,
            'studentNames'       => $studentNames,
            'department_name'    => $department_name,
            'semester_name'      => $semester_name,
            'examNamenew'        => $examNamenew
        ]);
    }
}
