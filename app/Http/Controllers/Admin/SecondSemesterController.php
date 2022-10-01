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
use App\Result;
use Session;
use App\Student;
use App\Totalmark;
use App\Hmark;
use App\new_exam;
use Illuminate\Support\Str;

class SecondSemesterController extends Controller
{
    public function index()
    {
        $newExams1 = new_exam::orderBy('id', 'desc')->get();
        return view(
            'admin.result.mange',
            [
                'newExams12' => $newExams1
            ]
        );
    }
    public function create($id)
    {
        $sectionId      = Exams::where('id', $id)->value('section_id');
        $sectionName    = Classinfo::where('id', $sectionId)->value('section_name');
        $departmentId   = Exams::where('id', $id)->value('department_id');
        $departmentName = Department::where('id', $departmentId)->value('department_name');
        $semesterId     = Exams::where('id', $id)->value('semester_id');
        $semesterName   = Semester::where('id', $semesterId)->value('semestername');
        $subjectId      = Exams::where('id', $id)->value('subject_id');
        $subjectName    = Subject::where('id', $subjectId)->value('subject_name');
        $examID         = Exams::where('id', $id)->value('id');
        $examName       = Exams::where('id', $examID)->value('exam_name');
        $categories     = Semester::orderBy('id', 'desc')->get();
        $sections       = Classinfo::orderBy('id', 'desc')->get();
        $categories1    = Semester::all();
        $uniquestudents = Result::all();
        $newExams1      = new_exam::orderBy('id', 'desc')->get();

        $exams = Exams::where('semester_id', $semesterId)
            ->where('department_id', $departmentId)
            ->where('section_id', $sectionId)
            ->get();

        $students = Student::where('semester_id', $semesterId)
            ->where('department_id', $departmentId)
            ->where('section_id', $sectionId)
            ->get();

        return view(
            'admin.result.add',
            [
                'newExams12'     => $newExams1,
                'subjectName'    => $subjectName,
                'categories'     => $categories,
                'sections'       => $sections,
                'categories1'    => $categories1,
                'sectionId'      => $sectionId,
                'departmentId'   => $departmentId,
                'semesterId'     => $semesterId,
                'exams'          => $exams,
                'examName'       => $examName,
                'students'       => $students,
                'examID'         => $examID,
                'uniquestudents' => $uniquestudents,
                'sectionName'    => $sectionName,
                'departmentName' => $departmentName,
                'semesterName'   => $semesterName,
                'subjectId'      => $subjectId
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'semester_id'   => 'required',
                'department_id' => 'required',
                'section_id'    => 'required',
                'subject_id'    => 'required',
                'exam_id'       => 'required',
                'roll'          => 'required',
                'written_exam'  => 'nullable',
                'mcq_exam'      => 'nullable',
                'incourse'      => 'nullable',
                'viva'          => 'nullable',
                'status'        => 'nullable',
                'valid'         => 'nullable'
            ]
        );


        $exam             = $request->input('exam_id');
        $writtenExammark  = $request->input('written_exam');
        $mcqExammark      = $request->input('mcq_exam');
        $viva             = $request->input('viva');
        $incourse         = $request->input('incourse');
        $roll             = $request->input('roll');
        $semester_id      = $request->input('semester_id');
        $subject_id       = $request->input('subject_id');
        $department_id    = $request->input('department_id');
        $valid            = $exam . $roll . $subject_id;
        $mainstudent      = Student::where('student_roll', $roll)->value('id');
        $validationSearch = Result::where('valid', $valid)->value('valid');

        if ($validationSearch  == $valid) {
            Toastr::warning('You Have Already Added The Number :)', 'Warning');
            return redirect()->back();
        } else {
            if (
                $subject_id == 3  || $subject_id == 4 ||
                $subject_id == 5  || $subject_id == 6 ||
                $subject_id == 7  || $subject_id == 8 ||
                $subject_id == 11 || $subject_id == 15 ||
                $subject_id == 18 || $subject_id == 23
            ) {
                $percantagemark = $writtenExammark + $mcqExammark + $incourse + $viva;
                $totalMarknew   = number_format($percantagemark, 2);
                $totalMark      = $totalMarknew;
            } elseif ($subject_id == 2 || $subject_id == 10 || $subject_id == 17) {

                $percantagemark = $writtenExammark;
                $calculateMark  = ($percantagemark * 75) / 100;
                $totalMarknew   = number_format($calculateMark, 2);
                $totalMark      = $totalMarknew + $incourse + $viva;
            } else {

                $percantagemark = $writtenExammark + $mcqExammark;
                $calculateMark  = ($percantagemark * 75) / 100;
                $totalMarknew   = number_format($calculateMark, 2);
                $totalMark      = $totalMarknew + $incourse + $viva;
            }

            //subjectwise grade point
            $mainTotal = $totalMark;

            //grade point Code
            if ($mainTotal >= 0 && $mainTotal <= 32) {
                $gradePoint = 0;
                $gradeLetter = 'F';
            } elseif ($mainTotal >= 33 && $mainTotal <= 39) {
                $gradePoint = 1;
                $gradeLetter = 'D';
            } elseif ($mainTotal >= 40 && $mainTotal <= 49) {
                $gradePoint = 2;
                $gradeLetter = 'C';
            } elseif ($mainTotal >= 50 && $mainTotal <= 59) {
                $gradePoint = 3;
                $gradeLetter = 'B';
            } elseif ($mainTotal >= 60 && $mainTotal <= 69) {
                $gradePoint = 3.5;
                $gradeLetter = 'A-';
            } elseif ($mainTotal >= 70 && $mainTotal <= 79) {
                $gradePoint = 4;
                $gradeLetter = 'A';
            } else {
                $gradePoint = 5;
                $gradeLetter = 'A+';
            }
            //gradepoint Code

            //new code
            $allTotalvaluenew = Result::where('students_id', $mainstudent)
                ->where('exam_id', $request->exam_id)
                ->value('main_total');
            //newcode


            $post                = new Result();
            $post->semester_id   = $request->semester_id;
            $post->department_id = $request->department_id;
            $post->section_id    = $request->section_id;
            $post->subject_id    = $request->subject_id;
            $post->students_id   = $mainstudent;
            $post->exam_id       = $request->exam_id;
            $post->roll          = $request->roll;
            $post->written_exam  = $writtenExammark;
            $post->mcq_exam      = $mcqExammark;
            $post->viva          = $viva;
            $post->incourse      = $incourse;
            $post->wm_total      = $totalMark;
            $post->main_total    = $mainTotal;
            $post->wm_per        = $totalMarknew;
            $post->gradePoint    = $gradePoint;
            $post->gradeLetter   = $gradeLetter;
            $post->status        = $request->status;
            $post->valid         = $valid;
            $post->save();
            $studentId           = $post->students_id;
            $examName1           = $post->exam_id;
            $subject_id          = $post->subject_id;
            $rid = $post->id;

            //total mark update
            $allTotalvalue = Result::where('students_id', $studentId)
                ->where('exam_id', $examName1)
                ->value('all_total');

            $mTotal = $allTotalvalue + $mainTotal;
            Result::where('students_id', $studentId)
                ->where('exam_id', $examName1)
                ->update(
                    [
                        'all_total' => $mTotal
                    ]
                );

            $totalSubject = Result::where('students_id', $studentId)
                ->where('exam_id', $examName1)
                ->count('id');

            $totalGpa = Result::where('students_id', $studentId)
                ->where('exam_id', $examName1)
                ->sum('gradePoint');
            //End Grade point

            if ($department_id == 1) {
                $result = $totalGpa / 9;
                $avgGpa = number_format($result, 2);
            } else {
                $result = $totalGpa / 8;
                $avgGpa = number_format($result, 2);
            }

            Result::where('students_id', $studentId)
                ->where('exam_id', $examName1)
                ->update(
                    [
                        'com' => $avgGpa
                    ]
                );

            //maxmum number subject wise
            $mainTotalValue = Result::where('subject_id', $subject_id)
                ->where('exam_id', $examName1)
                ->max('main_total');

            $update2 = Result::where('subject_id', $subject_id)
                ->where('exam_id', $examName1)
                ->update(
                    [
                        'highest_mark' => $mainTotalValue
                    ]
                );

            // Start Fail subject
            $failSub = Result::where('students_id', $studentId)
                ->where('exam_id', $examName1)
                ->value('fail_sub');

            if ($failSub == 0) {
                if (
                    $subject_id == 3 || $subject_id == 4 ||
                    $subject_id == 5 || $subject_id == 6 ||
                    $subject_id == 7 || $subject_id == 8 ||
                    $subject_id == 11 || $subject_id == 15 ||
                    $subject_id == 18 || $subject_id == 23
                ) {
                    if ($writtenExammark < 22 || $mcqExammark < 11) {
                        $failSub_update = $failSub + 1;
                        Result::where('students_id', $studentId)->where('exam_id', $examName1)
                            ->update(
                                [
                                    'fail_sub' => $failSub_update
                                ]
                            );
                    } else {
                        $failSub_update = 0;
                        Result::where('students_id', $studentId)
                            ->where('exam_id', $examName1)
                            ->update(
                                [
                                    'fail_sub' => $failSub_update
                                ]
                            );
                    }
                } elseif ($subject_id == 2 || $subject_id == 10 || $subject_id == 17) {

                    if ($writtenExammark < 45) {

                        $failSub_update = $failSub + 1;
                        Result::where('students_id', $studentId)
                            ->where('exam_id', $examName1)
                            ->update(
                                [
                                    'fail_sub' => $failSub_update
                                ]
                            );
                    } else {

                        $failSub_update = 0;
                        Result::where('students_id', $studentId)
                            ->where('exam_id', $examName1)
                            ->update(
                                [
                                    'fail_sub' => $failSub_update
                                ]
                            );
                    }
                } else {
                    if ($writtenExammark < 32 || $mcqExammark < 13) {

                        $failSub_update = $failSub + 1;
                        Result::where('students_id', $studentId)
                            ->where('exam_id', $examName1)
                            ->update(
                                [
                                    'fail_sub' => $failSub_update
                                ]
                            );
                    } else {

                        $failSub_update = 0;
                        Result::where('students_id', $studentId)
                            ->where('exam_id', $examName1)
                            ->update(
                                [
                                    'fail_sub' => $failSub_update
                                ]
                            );
                    }
                }
            } else {
                if ($failSub > 0) {
                    if (
                        $subject_id == 3 || $subject_id == 4 ||
                        $subject_id == 5 || $subject_id == 6 ||
                        $subject_id == 7 || $subject_id == 8 ||
                        $subject_id == 11 || $subject_id == 15 ||
                        $subject_id == 18 || $subject_id == 23
                    ) {
                        if ($writtenExammark < 22 || $mcqExammark < 11 || $totalMark < 33) {

                            $failSub_update = $failSub + 1;
                            Result::where('students_id', $studentId)
                                ->where('exam_id', $examName1)
                                ->update(
                                    [
                                        'fail_sub' => $failSub_update
                                    ]
                                );
                        } else {

                            $failSub_update = $failSub;
                            Result::where('students_id', $studentId)
                                ->where('exam_id', $examName1)
                                ->update(
                                    [
                                        'fail_sub' => $failSub_update
                                    ]
                                );
                        }
                    } elseif ($subject_id == 2 || $subject_id == 10 || $subject_id == 17) {
                        if ($writtenExammark < 45) {

                            $failSub_update = $failSub + 1;
                            Result::where('students_id', $studentId)
                                ->where('exam_id', $examName1)
                                ->update(
                                    [
                                        'fail_sub' => $failSub_update
                                    ]
                                );
                        } else {

                            $failSub_update = $failSub;
                            Result::where('students_id', $studentId)
                                ->where('exam_id', $examName1)
                                ->update(
                                    [
                                        'fail_sub' => $failSub_update
                                    ]
                                );
                        }
                    } else {
                        if ($writtenExammark < 32 || $mcqExammark < 13) {
                            $failSub_update = $failSub + 1;
                            Result::where('students_id', $studentId)
                                ->where('exam_id', $examName1)
                                ->update(
                                    [
                                        'fail_sub' => $failSub_update
                                    ]
                                );
                        } else {

                            $failSub_update = $failSub;
                            Result::where('students_id', $studentId)
                                ->where('exam_id', $examName1)
                                ->update(
                                    [
                                        'fail_sub' => $failSub_update
                                    ]
                                );
                        }
                    }
                }
            }
            // End Fail subject
        }
        Toastr::success('Successully Added :)', 'Success');
        return redirect()->back();
    }


    public function info($id)
    {

        $semesterId = Exams::where('id', $id)->value('semester_id');
        $semesterName = Semester::where('id', $semesterId)->value('semestername');
        $departmentId = Exams::where('id', $id)->value('department_id');
        $departmentName = Department::where('id', $departmentId)->value('department_name');
        $sectionId = Exams::where('id', $id)->value('section_id');
        $sectionName = Classinfo::where('id', $sectionId)->value('section_name');
        $subjectId = Exams::where('id', $id)->value('subject_id');
        $subjectName = Subject::where('id', $subjectId)->value('subject_name');
        $examID = Exams::where('id', $id)->value('id');
        $examName = Exams::where('id', $examID)->value('exam_name');
        $ExamInfo = Exams::where('subject_id', $subjectId)->where('department_id', $departmentId)->where('section_id', $sectionId)->where('exam_name', $examName)->first();
        $subjects = Subject::all();
        $hMark = Result::where('subject_id', $subjectId)->where('department_id', $departmentId)->where('section_id', $sectionId)->where('exam_name', $examName)->max('main_total');
        $categories = Result::where('subject_id', $subjectId)->where('department_id', $departmentId)->where('section_id', $sectionId)->where('exam_name', $examName)->get();
        $sections = Classinfo::orderBy('id', 'desc')->get();
        $categories1 = Semester::all();

        return view('admin.result.info', ['categories' => $categories, 'sections' => $sections, 'categories1' => $categories1, 'sectionId' => $sectionId, 'departmentName' => $departmentName, 'semesterName' => $semesterName, 'semesterId' => $semesterId, 'subjectName' => $subjectName, 'ExamInfo' => $ExamInfo, 'hMark' => $hMark, 'examName' => $examName, 'sectionName' => $sectionName, 'subjects' => $subjects]);
    }

    public function edit($id)
    {
        $results       = Result::find($id);
        $categories1   = Semester::all();
        $subjects      = Subject::all();
        $sectionId     = Result::where('id', $id)->value('section_id');
        $departmentId  = Result::where('id', $id)->value('department_id');
        $semesterId    = Result::where('id', $id)->value('semester_id');
        $studentId     = Result::where('id', $id)->value('students_id');
        $students      = Student::where('id', $studentId)->value('student_name');
        $students_roll = Result::where('id', $id)->value('roll');
        $subjectId     = Result::where('id', $id)->value('subject_id');
        $examID        = Result::where('id', $id)->value('exam_id');
        $examName      = Result::where('id', $id)->value('exam_name');

        $examNames = Exams::where('semester_id', $semesterId)
            ->where('department_id', $departmentId)
            ->where('exam_name', $examName)
            ->select('subject_id')
            ->get();

        return view(
            'admin.result.edit',
            [
                'subjects' => $subjects,
                'examNames' => $examNames,
                'sectionId' => $sectionId,
                'departmentId' => $departmentId,
                'semesterId' => $semesterId,
                'students' => $students,
                'results' => $results,
                'categories1' => $categories1,
                'students_roll' => $students_roll,
                'subjectId' => $subjectId,
                'examID' => $examID,
                'examName' => $examName,
                'studentId' => $studentId
            ]
        );
    }

    public function update(Request $request)
    {
        $writtenExammark  = $request->input('written_exam');
        $mcqExammark      = $request->input('mcq_exam');
        $mroll            = $request->input('roll');
        $semester_id      = $request->input('semester_id');
        $subject_id       = $request->input('subject_id');
        $incourse         = $request->input('incourse');
        $viva             = $request->input('viva');
        $department_id    = $request->input('department_id');
        $exam             = $request->input('exam_id');
        $valid            = $exam . $mroll + $subject_id;
        $mainstudent      = Student::where('student_roll', $mroll)->value('id');

        if (
            $subject_id == 3 || $subject_id == 4 ||
            $subject_id == 5 || $subject_id == 6 ||
            $subject_id == 7 || $subject_id == 8 ||
            $subject_id == 11 || $subject_id == 15 ||
            $subject_id == 18 || $subject_id == 23
        ) {

            $percantagemark  = $writtenExammark + $mcqExammark + $incourse + $viva;
            $totalMarknew    = number_format($percantagemark, 2);
            $totalMark       = $totalMarknew;
        } elseif ($subject_id == 2 || $subject_id == 10 || $subject_id == 17) {

            $percantagemark = $writtenExammark;
            $calculateMark  = ($percantagemark * 75) / 100;
            $totalMarknew   = number_format($calculateMark, 2);
            $totalMark      = $totalMarknew + $incourse + $viva;
        } else {

            $percantagemark = $writtenExammark + $mcqExammark;
            $calculateMark  = ($percantagemark * 75) / 100;
            $totalMarknew   = number_format($calculateMark, 2);
            $totalMark      = $totalMarknew + $incourse + $viva;
        }

        //subjectwise grade point
        $mainTotal = $totalMark;
        //grade point Code
        if ($mainTotal >= 0 && $mainTotal <= 32) {
            $gradePoint = 0;
            $gradeLetter = 'F';
        } elseif ($mainTotal >= 33 && $mainTotal <= 39) {
            $gradePoint = 1;
            $gradeLetter = 'D';
        } elseif ($mainTotal >= 40 && $mainTotal <= 49) {
            $gradePoint = 2;
            $gradeLetter = 'C';
        } elseif ($mainTotal >= 50 && $mainTotal <= 59) {
            $gradePoint = 3;
            $gradeLetter = 'B';
        } elseif ($mainTotal >= 60 && $mainTotal <= 69) {
            $gradePoint = 3.5;
            $gradeLetter = 'A-';
        } elseif ($mainTotal >= 70 && $mainTotal <= 79) {
            $gradePoint = 4;
            $gradeLetter = 'A';
        } else {

            $gradePoint = 5;
            $gradeLetter = 'A+';
        }
        //gradepoint Code

        $allTotalvaluenew = Result::where('students_id', $mainstudent)
            ->where('exam_id', $request->exam_id)
            ->value('main_total');

        $post                = Result::find($request->id);
        $post->semester_id   = $request->semester_id;
        $post->department_id = $request->department_id;
        $post->section_id    = $request->section_id;
        $post->subject_id    = $request->subject_id;
        $post->students_id   = $mainstudent;
        $post->exam_id       = $request->exam_id;
        $post->roll          = $request->roll;
        $post->written_exam  = $writtenExammark;
        $post->mcq_exam      = $mcqExammark;
        $post->wm_total      = $totalMark;
        $post->main_total    = $mainTotal;
        $post->wm_per        = $totalMarknew;
        $post->gradePoint    = $gradePoint;
        $post->gradeLetter   = $gradeLetter;
        $post->status        = $request->status;
        $post->valid         = $valid;
        $post->save();
        $studentId           = $post->students_id;
        $examName1           = $post->exam_id;
        $subject_id          = $post->subject_id;
        $rid                 = $post->id;

        //total mark update
        $allTotalvalue = Result::where('students_id', $studentId)
            ->where('exam_id', $examName1)
            ->value('all_total');

        $mTotal = $allTotalvalue + $mainTotal;

        $update = Result::where('students_id', $studentId)
            ->where('exam_id', $examName1)
            ->update(
                [
                    'all_total' => $mTotal
                ]
            );
        //total Cgpa update

        $totalSubject = Result::where('students_id', $studentId)
            ->where('exam_id', $examName1)
            ->count('id');

        $totalGpa = Result::where('students_id', $studentId)
            ->where('exam_id', $examName1)
            ->sum('gradePoint');

        if ($department_id == 1) {

            $result = $totalGpa / 9;
            $avgGpa = number_format($result, 2);
        } else {
            $result = $totalGpa / 8;
            $avgGpa = number_format($result, 2);
        }
        Result::where('students_id', $studentId)
            ->where('exam_id', $examName1)
            ->update(
                [
                    'com' => $avgGpa
                ]
            );
        //End CGPA

        //maxmum number subject wise
        $mainTotalValue = Result::where('subject_id', $subject_id)
            ->where('exam_id', $examName1)
            ->max('main_total');

        //maxmum number subject wise
        $update2 = Result::where('subject_id', $subject_id)
            ->where('exam_id', $examName1)
            ->update(
                [
                    'highest_mark' => $mainTotalValue
                ]
            );

        //Fail subject start
        $failSub = Result::where('students_id', $studentId)
            ->where('exam_id', $examName1)
            ->value('fail_sub');
        if ($failSub == 0) {
            if (
                $subject_id == 3 || $subject_id == 4 ||
                $subject_id == 5 || $subject_id == 6 ||
                $subject_id == 7 || $subject_id == 8 ||
                $subject_id == 11 || $subject_id == 15 ||
                $subject_id == 18 || $subject_id == 23
            ) {
                if ($writtenExammark < 22 || $mcqExammark < 11) {
                    $failSub_update = $failSub + 1;
                    Result::where('students_id', $studentId)
                        ->where('exam_id', $examName1)
                        ->update(
                            [
                                'fail_sub' => $failSub_update
                            ]
                        );
                } else {
                    $failSub_update = 0;
                    Result::where('students_id', $studentId)
                        ->where('exam_id', $examName1)
                        ->update(
                            [
                                'fail_sub' => $failSub_update
                            ]
                        );
                }
            } elseif ($subject_id == 2 || $subject_id == 10 || $subject_id == 17) {
                if ($writtenExammark < 45) {
                    $failSub_update = $failSub + 1;
                    Result::where('students_id', $studentId)
                        ->where('exam_id', $examName1)
                        ->update(
                            [
                                'fail_sub' => $failSub_update
                            ]
                        );
                } else {
                    $failSub_update = 0;
                    Result::where('students_id', $studentId)
                        ->where('exam_id', $examName1)
                        ->update(
                            [
                                'fail_sub' => $failSub_update
                            ]
                        );
                }
            } else {
                if ($writtenExammark < 32 || $mcqExammark < 13) {

                    $failSub_update = $failSub + 1;
                    Result::where('students_id', $studentId)
                        ->where('exam_id', $examName1)
                        ->update(
                            [
                                'fail_sub' => $failSub_update
                            ]
                        );
                } else {
                    $failSub_update = 0;
                    Result::where('students_id', $studentId)
                        ->where('exam_id', $examName1)
                        ->update(
                            [
                                'fail_sub' => $failSub_update
                            ]
                        );
                }
            }
        } else {
            if ($failSub > 0) {
                if (
                    $subject_id == 3 || $subject_id == 4 ||
                    $subject_id == 5 || $subject_id == 6 ||
                    $subject_id == 7 || $subject_id == 8 ||
                    $subject_id == 11 || $subject_id == 15 ||
                    $subject_id == 18 || $subject_id == 23
                ) {
                    if ($writtenExammark < 22 || $mcqExammark < 11) {
                        $failSub_update = $failSub;
                        Result::where('students_id', $studentId)
                            ->where('exam_id', $examName1)
                            ->update(
                                [
                                    'fail_sub' => $failSub_update
                                ]
                            );
                    } else {
                        $failSub_update = $failSub - 1;
                        Result::where('students_id', $studentId)
                            ->where('exam_id', $examName1)
                            ->update(
                                [
                                    'fail_sub' => $failSub_update
                                ]
                            );
                    }
                } elseif ($subject_id == 2 || $subject_id == 10 || $subject_id == 17) {
                    if ($writtenExammark < 45) {
                        $failSub_update = $failSub;
                        Result::where('students_id', $studentId)
                            ->where('exam_id', $examName1)
                            ->update(
                                [
                                    'fail_sub' => $failSub_update
                                ]
                            );
                    } else {
                        $failSub_update = $failSub - 1;
                        Result::where('students_id', $studentId)
                            ->where('exam_id', $examName1)
                            ->update(
                                [
                                    'fail_sub' => $failSub_update
                                ]
                            );
                    }
                } else {
                    if ($writtenExammark < 32 || $mcqExammark < 13) {
                        $failSub_update = $failSub;
                        Result::where('students_id', $studentId)
                            ->where('exam_id', $examName1)
                            ->update(
                                [
                                    'fail_sub' => $failSub_update
                                ]
                            );
                    } else {
                        $failSub_update = $failSub - 1;
                        Result::where('students_id', $studentId)->where('exam_id', $examName1)->update(
                            [
                                'fail_sub' => $failSub_update
                            ]
                        );
                    }
                }
            }
        }
        //end Fail subject
        Toastr::success('Successully Updated :)', 'Success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        Result::find($id)->delete();

        Toastr::warning('Successfully Deleted :)', 'Success');
        return redirect()->back();
    }

    public function crosscheck(Request $request)
    {
        if ($request->ajax()) {

            $data = Student::where('student_roll', 'LIKE', $request->roll . '%')
                ->select('student_name')
                ->get();

            $output = '';

            if (count($data) > 0) {

                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';

                foreach ($data as $row) {

                    $output .= '<li class="list-group-item">' . $row->student_name . '</li>';
                }

                $output .= '</ul>';
            } else {

                $output .= '<li class="list-group-item">' . 'No results' . '</li>';
            }

            return $output;
        }
    }
}
