<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('c_name')->nullable();
            $table->string('c_slug')->unique();
            $table->tinyInteger('c_total_time')->default(0);
            $table->tinyInteger('c_status')->default(1);
            $table->string('c_avatar')->nullable();
            $table->tinyInteger('c_hot')->default(0);
            $table->tinyInteger('c_sale')->default(0);
            $table->tinyInteger('c_level')->default(0);
            $table->integer('c_price')->default(0);
            $table->string('c_title_seo')->nullable();
            $table->string('c_keyword_seo')->nullable();
            $table->string('c_description_seo')->nullable();
            $table->integer('c_teacher_id')->index()->default(0);
            $table->integer('c_category_id')->index()->default(0);
            $table->integer('c_total_evaluate')->default(0);
            $table->integer('c_total_star')->default(0);
            $table->integer('c_total_pay')->default(0);
            $table->string('c_video_demo')->nullable();
            $table->text('c_about')->nullable();
            $table->text('c_content')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
