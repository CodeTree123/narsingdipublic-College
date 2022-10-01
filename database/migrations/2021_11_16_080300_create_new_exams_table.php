<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_exams', function (Blueprint $table) {
            $table->id();
            $table->string('exam_name')->nullable();
            $table->string('exam_type')->nullable();
            $table->string('type')->nullable();

            $table->string('date')->nullable();
            $table->string('status')->nullable();
            $table->string('semester_id')->nullable();
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
        Schema::dropIfExists('new_exams');
    }
}
