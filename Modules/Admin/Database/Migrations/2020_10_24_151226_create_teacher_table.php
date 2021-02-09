<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('t_name')->nullable();
            $table->string('t_slug')->unique();
            $table->string('t_avatar')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('password')->nullable()->unique();
            $table->string('t_job')->nullable();
            $table->string('t_phone')->nullable();
            $table->string('t_email')->nullable();
            $table->string('t_description')->nullable();
            $table->text('t_content')->nullable();
            $table->tinyInteger('t_count_course')->default(0);
            $table->tinyInteger('t_question')->default(0);
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
        Schema::dropIfExists('teachers');
    }
}
