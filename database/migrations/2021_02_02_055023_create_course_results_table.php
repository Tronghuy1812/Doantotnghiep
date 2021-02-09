<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_results', function (Blueprint $table) {
            $table->id();
            $table->integer('cr_question_id')->default(0)->index();
            $table->integer('cr_user_id')->default(0)->index();
            $table->integer('cr_course_id')->default(0)->index();
            $table->integer('cr_answer_id')->default(0)->index();
            $table->integer('cr_result_dashboard')->default(0);
            $table->tinyInteger('cr_flag_result')->default(0)->comment("đáp án này đúng hay sai");
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
        Schema::dropIfExists('course_results');
    }
}
