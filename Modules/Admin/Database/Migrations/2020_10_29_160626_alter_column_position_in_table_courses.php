<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnPositionInTableCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->tinyInteger('c_position_1')->after('c_hot')->default(0);
            $table->tinyInteger('c_position_2')->after('c_hot')->default(0);
            $table->tinyInteger('c_position_3')->after('c_hot')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn(['c_position_1','c_position_2','c_position_3']);
        });
    }
}
