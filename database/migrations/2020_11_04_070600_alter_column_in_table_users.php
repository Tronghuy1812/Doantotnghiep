<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnInTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('job')->nullable();
            $table->char('phone',15)->nullable();
            $table->string('avatar')->nullable();
            $table->string('address')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('total_course')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['job','phone','avatar','address','status','total_course']);
        });
    }
}
