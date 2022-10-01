<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('semester_id')->nullable();
            $table->string('department_id')->nullable();
            $table->string('section_id')->nullable();
            $table->string('subject_id')->nullable();
            $table->string('students_id')->nullable();
            $table->string('exam_id')->nullable();
            $table->string('com')->nullable();
            $table->string('roll')->nullable();
            $table->string('exam_name')->nullable();
            $table->integer('written_exam')->default(0);
            $table->integer('mcq_exam')->nullable();
            $table->integer('incourse')->nullable();
            $table->integer('viva')->nullable();
            $table->integer('behave')->nullable();
            $table->integer('wm_per')->default(0);
            $table->integer('wm_total')->default(0);
            $table->string('highest_mark')->nullable();
            $table->integer('main_total')->default(0);
            $table->integer('all_total')->default(0);
            $table->string('fail_status')->nullable();
            $table->string('fail_sub')->default(0);
            $table->string('gradePoint')->nullable();
            $table->string('gradeLetter')->nullable();

            $table->tinyInteger('status')->default(1);
            $table->Integer('valid')->default(0);

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
        Schema::dropIfExists('results');
    }
}
