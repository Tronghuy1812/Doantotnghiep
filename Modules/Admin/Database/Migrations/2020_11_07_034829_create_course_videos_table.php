<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_videos', function (Blueprint $table) {
            $table->id();
            $table->string('cv_name')->nullable();
            $table->string('cv_path')->nullable();
            $table->mediumText('cv_link')->nullable();
            $table->integer('cv_course_content_id')->default(0);
            $table->integer('cv_course_id')->default(0);
            $table->tinyInteger('cv_status')->default(0);
            $table->tinyInteger('cv_sort')->default(0);
            $table->text('cv_content')->nullable();
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
        Schema::dropIfExists('courses_videos');
    }
}
