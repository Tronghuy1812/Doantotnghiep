<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_tags', function (Blueprint $table) {
            $table->id();
            $table->integer('ct_course_id')->index();
            $table->integer('ct_tag_id')->index();
            $table->unique(['ct_course_id','ct_tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses_tags');
    }
}
