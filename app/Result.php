<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
     public function semesterInfo()
   {
      return $this->belongsTo('App\Semester','semester_id','id');
   }


   public function departmentInfo()
   {
      return $this->belongsTo('App\Department','department_id','id');
   }


   public function sectionInfo()
   {
      return $this->belongsTo('App\Classinfo','section_id','id');
   }



   public function subjectInfo()
   {
      return $this->belongsTo('App\Subject','subject_id','id');
   }


    public function studentsInfo()
   {
      return $this->belongsTo('App\Student','students_id','id');
   }
}
