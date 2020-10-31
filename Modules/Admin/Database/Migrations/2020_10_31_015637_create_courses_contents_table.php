<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_contents', function (Blueprint $table) {
            $table->id();
            $table->string('cc_name')->nullable();
            $table->tinyInteger('cc_total_video')->default(0);
            $table->tinyInteger('cc_total_question')->default(0);
            $table->tinyInteger('cc_sort')->default(0);
            $table->integer('cc_course_id')->default(0)->index();
            $table->text('cc_content')->nullable();
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
        Schema::dropIfExists('courses_contents');
    }
}
