<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use PDF;
use Brian2694\Toastr\Facades\Toastr;
use App\Semester;
use App\Student;
use App\Teacher;
use App\Department;
use App\Classinfo;

class DashboardController extends Controller
{
    public function index()
    {

        $categories1      = Semester::all();
        $student_count    = Student::count();
        $teacher_count    = Teacher::count();
        $dep_count        = Department::count();
        $section_count    = Classinfo::count();
        $latests_Students = Student::orderby('id', 'desc')->limit(8)->get();
        $teachers_info    = Teacher::orderby('id', 'desc')->get();

        return view(
            'admin.dashboard',
            [
                'teachers_info'    => $teachers_info,
                'latests_Students' => $latests_Students,
                'categories1'      => $categories1,
                'student_count'    => $student_count,
                'teacher_count'    => $teacher_count,
                'dep_count'        => $dep_count,
                'section_count'    => $section_count
            ]
        );
    }
}
