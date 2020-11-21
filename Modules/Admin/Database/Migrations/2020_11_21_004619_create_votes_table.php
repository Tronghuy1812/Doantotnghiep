<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->integer('v_user_id')->default(0);
            $table->integer('v_id')->default(0)->comment(' ID khoá học, ID combo khoá học');
            $table->tinyInteger('v_type')->default(1)->comment(' 1 la khoa hoc');
            $table->text('v_content')->nullable();
            $table->tinyInteger('v_number')->default(0);
            $table->tinyInteger('v_status')->default(1);
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
        Schema::dropIfExists('votes');
    }
}
