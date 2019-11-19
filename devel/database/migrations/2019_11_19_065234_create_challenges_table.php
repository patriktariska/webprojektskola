<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mobility_id');
            $table->foreign('mobility_id')->references('id')->on('mobilities');
            $table->string('name');
            $table->string('type');
            $table->string('description');
            $table->string('capacity');
            $table->date('start');
            $table->date('end');
            $table->string('title_photo');
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
        Schema::dropIfExists('challenges');
    }
}
