<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers_tags', function (Blueprint $table) {
            $table->id();
            $table->integer('tt_teacher_id')->default(0)->index();
            $table->integer('tt_tag_id')->default(0)->index();
            $table->unique(['tt_teacher_id','tt_tag_id']);
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
        Schema::dropIfExists('teachers_tags');
    }
}
