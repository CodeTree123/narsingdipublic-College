<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function semesterInfo()
   {
      return $this->belongsTo(Semester::class,'semester_id','id');
   }
   public function departmentInfo()
   {
      return $this->belongsTo(Department::class,'department_id','id');
   }
   public function sectionInfo()
   {
      return $this->belongsTo(Classinfo::class,'section_id','id');
   }
}
