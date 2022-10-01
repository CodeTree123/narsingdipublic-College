<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('semester_id')->nullable();
            $table->string('department_id')->nullable();
            $table->string('section_id')->nullable();
            $table->string('student_name')->nullable();
            $table->string('student_phone')->nullable();
            $table->string('student_email')->nullable();
            $table->text('student_address')->nullable();
            $table->string('student_dob')->nullable();
            $table->string('student_image')->nullable();
            $table->string('student_roll')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
