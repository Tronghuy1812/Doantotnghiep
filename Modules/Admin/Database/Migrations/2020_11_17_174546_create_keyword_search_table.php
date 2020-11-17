<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeywordSearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keywords_search', function (Blueprint $table) {
            $table->id();
            $table->string('ks_name')->nullable();
            $table->string('ks_slug')->index()->unique();
            $table->tinyInteger('ks_count')->default(0);
            $table->integer('ks_total_count_search')->default(0);
            $table->tinyInteger('ks_status')->default(0);
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
        Schema::dropIfExists('keywords_search');
    }
}
