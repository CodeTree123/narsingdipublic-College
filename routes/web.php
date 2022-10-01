<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    return 'Cleared!';
});

Route::get('/', 'MainController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/findProductName', 'MainController@findProductName');
Route::get('/findProductNamenew', 'MainController@findProductNamenew');
Route::get('/findProductName1', 'MainController@findProductName1');
Route::get('/findProductName3', 'MainController@findProductName3');
Route::get('/findProductName4', 'MainController@findProductName4');
Route::get('/findProductName40', 'MainController@findProductName40');


Route::get('/about', 'MainController@about')->name('about');
Route::get('/view', 'MainController@view')->name('viewresult');
Route::get('/view/result/', 'MainController@viewr')->name('viewresultr');

Route::get('/notice', 'MainController@notice')->name('notice');
Route::get('/admission', 'MainController@admission')->name('admission');
Route::get('/online-lecture', 'MainController@onlinelecture')->name('online-lecture');
Route::get('/contact', 'MainController@contact')->name('contact');

Route::get('new/student/add/', 'MainController@create')->name('studentCreate');
Route::post('new/student/store', 'MainController@store')->name('studentstore');
Route::get('welcome/student', 'MainController@student')->name('student');
Route::get('search/student/', 'MainController@searching')->name('students.search');
Route::get('/student/search/exam/wise/result/{id}', 'MainController@student_exam_wise_result')->name('student_search_exam_wise_result');
Route::get('/student/result/{eid}/{sid}', 'MainController@result')->name('student.result_print');




Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {


    Route::get('retake/', 'RetakeController@index')->name('retake');
    Route::get('retake/add/search', 'RetakeController@searchstudent')->name('addResult.searchr');
    Route::get('retake/subject/search', 'RetakeController@searchsubject')->name('addSub.searchr');

    Route::get('/retake/subject/{id}', 'RetakeController@indexsub')->name('retake.subject');
    Route::get('/result/add/{id}', 'RetakeController@create')->name('retake.create');
    Route::get('/retake/info/{id}', 'RetakeController@info')->name('retake.info');
    Route::get('term/exam/retake/info/{id}', 'RetakeController@terminfo')->name('retake.terminfo');
    Route::post('/retake/store', 'RetakeController@store')->name('retake.store');
    Route::post('/retake/destroy/{id}', 'RetakeController@destroy')->name('retake.destroy');
    Route::get('/retake/edit/{id}', 'RetakeController@edit')->name('retake.edit');
    Route::get('all/retake/view', 'RetakeController@vv')->name('retake.vv');
    Route::post('/retake/update/', 'RetakeController@update')->name('retake.update');



    Route::get('department', 'SectionController@index')->name('section');
    Route::get('/department/add', 'SectionController@create')->name('section.create');
    Route::post('/department/store', 'SectionController@store')->name('section.store');
    Route::post('/department/destroy/{id}', 'SectionController@destroy')->name('section.destroy');
    Route::get('/department/edit/{slug}', 'SectionController@edit')->name('section.edit');
    Route::post('/department/update/', 'SectionController@update')->name('section.update');
    Route::get('/department/customize/', 'SectionController@customize')->name('section.customize');


    Route::get('semester', 'SemesterController@index')->name('semester');
    Route::get('/semester/add', 'SemesterController@create')->name('semester.create');
    Route::post('/semester/store', 'SemesterController@store')->name('semester.store');
    Route::post('/semester/destroy/{id}', 'SemesterController@destroy')->name('semester.destroy');
    Route::get('/semester/edit/{slug}', 'SemesterController@edit')->name('semester.edit');
    Route::post('/semester/update/', 'SemesterController@update')->name('semester.update');
    Route::get('/semester/customize/', 'SemesterController@customize')->name('semester.customize');

    Route::get('classInformation/', 'ClassinfoController@index')->name('classinfo');
    Route::get('/classInformation/add/', 'ClassinfoController@create')->name('classinfo.create');
    Route::post('/classInformation/store', 'ClassinfoController@store')->name('classinfo.store');
    Route::post('/classInformation/destroy/{id}', 'ClassinfoController@destroy')->name('classinfo.destroy');
    Route::get('/classInformation/edit/{slug}', 'ClassinfoController@edit')->name('classinfo.edit');
    Route::post('/classInformation/update/', 'ClassinfoController@update')->name('classinfo.update');
    Route::get('/classInformation/customize/', 'ClassinfoController@customize')->name('classinfo.customize');


    Route::get('subject', 'SubjectController@index')->name('subject');
    Route::get('/subject/add', 'SubjectController@create')->name('subject.create');
    Route::post('/subject/store', 'SubjectController@store')->name('subject.store');
    Route::post('/subject/destroy/{id}', 'SubjectController@destroy')->name('subject.destroy');
    Route::get('/subject/edit/{slug}', 'SubjectController@edit')->name('subject.edit');
    Route::post('/subject/update/', 'SubjectController@update')->name('subject.update');
    Route::get('/subject/customize/', 'SubjectController@customize')->name('subject.customize');

    Route::get('student/', 'StudentController@index')->name('student');
    Route::get('/student/add/', 'StudentController@create')->name('student.create');
    Route::get('/student/info/', 'StudentController@info')->name('student.info');
    Route::get('/student/result/{eid}/{sid}', 'StudentController@result')->name('student.result');

    Route::get('/student/result/print/{id}/{ename}', 'StudentController@resultprint')->name('student.resultprint');

    Route::get('/student/view/result/print/{id}/{ename}', 'StudentController@resultprintview')->name('studentview.resultprint');

    Route::get('/student/re-take-result/{id}', 'StudentController@resultr')->name('student.resultr');

    Route::get('/student/re-take-result/print/{id}/{ename}', 'StudentController@resultprintr')->name('student.resultprintr');

    Route::get('/student/view/re-take-result/print/{id}/{ename}', 'StudentController@resultprintviewr')->name('studentview.resultprintr');

    Route::get('/student/termExam/{id}', 'StudentController@termExam')->name('student.termExam');
    Route::get('/student/termExam/add/{id}', 'StudentController@termExamAdd')->name('studentTermExam.add');
    Route::post('/student/store', 'StudentController@store')->name('student.store');
    Route::post('/student/destroy/{id}', 'StudentController@destroy')->name('student.destroy');
    Route::get('/student/edit/{slug}', 'StudentController@edit')->name('student.edit');
    Route::post('/student/update/', 'StudentController@update')->name('student.update');
    Route::get('/student/search/', 'StudentController@search')->name('student.search');


    Route::get('/student/search/exam_wise_result/{id}', 'StudentController@exam_wise_result')->name('student.search_exam_wise_result');

    Route::get('parent', 'ParentController@index')->name('parent');
    Route::get('/parent/add', 'ParentController@create')->name('parent.create');
    Route::post('/parent/store', 'ParentController@store')->name('parent.store');
    Route::post('/parent/destroy/{id}', 'ParentController@destroy')->name('parent.destroy');
    Route::get('/parent/edit/{slug}', 'ParentController@edit')->name('parent.edit');
    Route::post('/parent/update/', 'ParentController@update')->name('parent.update');

    Route::get('teacher/', 'TeacherController@index')->name('teacher');
    Route::get('/teacher/add/', 'TeacherController@create')->name('teacher.create');
    Route::get('/teacher/subject/add/info/{id}', 'TeacherController@infoadd')->name('teacher.infoadd');
    Route::get('/teacher/subject/veiw/info/{id}', 'TeacherController@infoview')->name('teacher.infoview');

    Route::post('/teacher/subject/store/info/', 'TeacherController@infostore')->name('teacher.infostore');


    Route::post('/teacher/store', 'TeacherController@store')->name('teacher.store');
    Route::get('/teacher/search', 'TeacherController@search')->name('teachersearch');

    Route::post('/teacher/destroy/{id}', 'TeacherController@destroy')->name('teacher.destroy');
    Route::get('/teacher/edit/{id}', 'TeacherController@edit')->name('teacher.edit');
    Route::post('/teacher/update/', 'TeacherController@update')->name('teacher.update');

    Route::get('Semester/Exam', 'FirstSemesterController@index')->name('exam.semester');
    Route::get('Semester/Exam/add/', 'FirstSemesterController@create')->name('exam.create');
    Route::get('Semester/Exam/info/{id}', 'FirstSemesterController@info')->name('exam.info');
    Route::post('Semester/Exam/store', 'FirstSemesterController@store')->name('exam.store');
    Route::post('Semester/Exam/destroy/{id}', 'FirstSemesterController@destroy')->name('firstSemester.destroy');
    Route::get('Semester/Exam/edit/{id}', 'FirstSemesterController@edit')->name('firstSemester.edit');
    Route::post('Semester/Exam/update/', 'FirstSemesterController@update')->name('firstSemester.update');
    Route::get('Semester/Exam/search/', 'FirstSemesterController@search')->name('firstSemester.search');


    Route::post('new/Exam/type/', 'FirstSemesterController@exam_type')->name('exam_type');
    Route::get('new/Exam/type/view/', 'FirstSemesterController@exam_type_view')->name('exam_type_view');
    Route::post('new/Exam/type/delete/{id}', 'FirstSemesterController@destroyexam_type')->name('type_destroy');
    Route::get('new/Exam/type/edit/{id}', 'FirstSemesterController@type_edit')->name('type_edit');
    Route::post('new/Exam/type/update/', 'FirstSemesterController@type_update')->name('type_update');



    Route::post('new/Exam/name/', 'FirstSemesterController@ename')->name('enamenew');
    Route::get('new/Exam_List/name/', 'FirstSemesterController@exam_list')->name('exam_list');
    Route::post('/exam_list/destroy/{id}', 'FirstSemesterController@destroyexam_list')->name('exam_list.destroy');
    Route::get('/exam_list/edit/{id}', 'FirstSemesterController@editexam_list')->name('exam_list.edit');
    Route::post('/exam_list/update/', 'FirstSemesterController@updateexam_list')->name('exam_list.update');



    Route::get('add_new_result/{eid}/{sid}', 'NewResultController@index')->name('new_result_2021');
    Route::get('upgrade_student_semester/', 'NewResultController@upgrade_student_semester')->name('upgrade_student_semester');



    Route::post('/select-sub-Category', 'NewResultController@selectSubcategory')->name('subcategory.selectSubcategory');

    Route::get('/search_subject_deparment', 'NewResultController@search_subject_deparment')->name('search_subject_deparment');

    Route::get('/search_subject_deparment_add_result', 'NewResultController@search_subject_deparment_add_result')->name('search_subject_deparment_add_result');

    Route::get('/new_result_list/{id}', 'NewResultController@new_result_list')->name('new_result_list');


    Route::get('result/', 'SecondSemesterController@index')->name('result');
    Route::get('result/add/search/mainexam', 'SecondSemesterController@searchstudent1')->name('addResult.searchm');
    Route::get('result/subject/search', 'SecondSemesterController@searchsubject')->name('addSub.search');

    Route::get('/result/subject/{id}', 'SecondSemesterController@indexsub')->name('result.subject');
    Route::get('/result/add/{id}', 'SecondSemesterController@create')->name('result.create');
    Route::get('/result/info/{id}', 'SecondSemesterController@info')->name('result.info');
    Route::get('term/exam/result/info/{id}', 'SecondSemesterController@terminfo')->name('result.terminfo');
    Route::post('/result/store', 'SecondSemesterController@store')->name('result.store');
    Route::post('/result/destroy/{id}', 'SecondSemesterController@destroy')->name('result.destroy');
    Route::get('/result/edit/{id}', 'SecondSemesterController@edit')->name('result.edit');
    Route::get('all/result/view', 'SecondSemesterController@vv')->name('result.vv');
    Route::post('/result/update/', 'SecondSemesterController@update')->name('result.update');

    Route::get('/student/name/cross-check', 'SecondSemesterController@crosscheck')->name('result.cross-check');


    Route::get('allSubject/result/', 'ComController@index')->name('allSubject');
    Route::get('allSubject/result/subject/', 'ComController@indexsub')->name('allSubject.subject');
    Route::get('allSubject/result/add/{id}', 'ComController@create')->name('allSubject.create');
    Route::get('allSubject/result/info/', 'ComController@info')->name('allSubject.info');
    Route::post('allSubject/result/store', 'ComController@store')->name('allSubject.store');
    Route::post('allSubject/result/destroy/{id}', 'ComController@destroy')->name('allSubject.destroy');


    Route::get('allSubject/result/edit/', 'ComController@edit')->name('allSubject.edit');

    Route::post('allSubject/result/update/', 'ComController@update')->name('allSubject.update');
    Route::post('agriculture/result/update/', 'ComController@agriculture')->name('agriculture.update');
    Route::post('subjectwise/result/update/', 'ComController@subjectwise')->name('subjectwise.update');

    Route::get('combined_result/info/{sid}/{id}', 'ComController@section')->name('allSubject.section');
    Route::get('combined_result/pass/info/{sid}/{id}', 'ComController@sectionpass')->name('allSubjectpass.section');
    Route::get('combined_result/fail/info/{sid}/{id}', 'ComController@sectionfail')->name('allSubjectfail.section');


    Route::get('allSubject/retake/', 'ComrController@index')->name('allSubjectr');
    Route::get('allSubject/retake/subject/', 'ComrController@indexsub')->name('allSubject.subjectr');
    Route::get('allSubject/retake/add/{id}', 'ComrController@create')->name('allSubjectr.create');
    Route::get('allSubject/retake/info/', 'ComrController@info')->name('allSubjectr.info');
    Route::post('allSubject/retake/store', 'ComrController@store')->name('allSubjectr.store');
    Route::post('allSubject/retake/destroy/{id}', 'ComrController@destroy')->name('allSubjectr.destroy');


    Route::get('allSubject/result/edit/', 'ComrController@edit')->name('allSubjectr.edit');
    Route::post('allSubject/retake-result/update/', 'ComrController@update')->name('allSubjectr.update');

    Route::get('combined_result_retake/info/{sid}/{id}/{name}', 'ComrController@section')->name('allSubjectr.section');
    Route::get('combined_result_retake/pass/info/{sid}/{id}/{sec}', 'ComrController@sectionpass')->name('allSubjectrpass.section');
    Route::get('combined_result_retake/fail/info/{sid}/{id}/{sec}', 'ComrController@sectionfail')->name('allSubjectrfail.section');



    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('settings', 'SettingController@index')->name('settings');
    Route::put('profile-update/{id}', 'SettingController@updateProfile')->name('profile.update');
    Route::put('password-update', 'SettingController@updatePassword')->name('password.update');
});

Route::group(['as' => 'user.', 'prefix' => 'user', 'namespace' => 'User', 'middleware' => ['auth', 'user']], function () {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('settings', 'SettingController@index')->name('settings');
    Route::put('profile-update/{id}', 'SettingController@updateProfile')->name('profile.update');
    Route::put('password-update', 'SettingController@updatePassword')->name('password.update');


    Route::get('semester', 'SemesterController@index')->name('semester');
    Route::get('/semester/add', 'SemesterController@create')->name('semester.create');
    Route::post('/semester/store', 'SemesterController@store')->name('semester.store');
    Route::post('/semester/destroy/{id}', 'SemesterController@destroy')->name('semester.destroy');
    Route::get('/semester/edit/{slug}', 'SemesterController@edit')->name('semester.edit');
    Route::post('/semester/update/', 'SemesterController@update')->name('semester.update');
    Route::get('/semester/customize/', 'SemesterController@customize')->name('semester.customize');


    Route::get('/teacher/subject/veiw/info/{id}', 'TeacherController@infoview')->name('teacher.infoview');

    Route::get('/teacher/subject/result/{se_id}/{d_id}/{sec_id}/{sub_id}', 'TeacherController@infoview1')->name('teacher.infoviewresult');
});

Route::group(['as' => 'agent.', 'prefix' => 'agent', 'namespace' => 'Agent', 'middleware' => ['auth', 'agent']], function () {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('settings', 'SettingController@index')->name('settings');
    Route::put('profile-update/{id}', 'SettingController@updateProfile')->name('profile.update');
    Route::put('password-update', 'SettingController@updatePassword')->name('password.update');
});

Route::group(['as' => 'merchant.', 'prefix' => 'merchant', 'namespace' => 'Merchant', 'middleware' => ['auth', 'merchant']], function () {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('settings', 'SettingController@index')->name('settings');
    Route::put('profile-update/{id}', 'SettingController@updateProfile')->name('profile.update');
    Route::put('password-update', 'SettingController@updatePassword')->name('password.update');
});

Route::group(['as' => 'vip.', 'prefix' => 'vip', 'namespace' => 'Vip', 'middleware' => ['auth', 'vip']], function () {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('settings', 'SettingController@index')->name('settings');
    Route::put('profile-update/{id}', 'SettingController@updateProfile')->name('profile.update');
    Route::put('password-update', 'SettingController@updatePassword')->name('password.update');
});
