<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeoEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_education', function (Blueprint $table) {
            $table->id();
            $table->string('se_slug')->nullable();
            $table->string('se_md5')->unique()->index();
            $table->tinyInteger('se_type')->default(1)->comment('1 tag, 2 category, 3 course');
            $table->integer('se_id')->default(0);
            $table->unique(['se_id','se_type']);
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
        Schema::dropIfExists('seo_education');
    }
}
