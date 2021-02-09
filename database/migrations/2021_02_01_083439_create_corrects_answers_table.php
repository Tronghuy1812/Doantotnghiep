<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorrectsAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corrects_answers', function (Blueprint $table) {
            $table->id();
            $table->integer('ca_course_id')->index()->default(0);
            $table->integer('ca_answer_id')->index()->default(0);
            $table->integer('ca_question_id')->index()->default(0);
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
        Schema::dropIfExists('corrects_answers');
    }
}
