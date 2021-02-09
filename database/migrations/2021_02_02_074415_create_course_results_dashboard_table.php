<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseResultsDashboardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_results_dashboard', function (Blueprint $table) {
            $table->id();
            $table->integer('crd_total_answer')->default(0);
            $table->integer('crd_total_correct_answer')->default(0);
            $table->integer('crd_total_correct_wrong')->default(0);
            $table->integer('crd_total_correct_empty')->default(0);
            $table->integer('crd_user_id')->default(0);
            $table->integer('crd_course_id')->default(0);
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
        Schema::dropIfExists('course_results_dashboard');
    }
}
