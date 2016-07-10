<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNesReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nes_releases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('game_id');
            $table->integer('year');
            $table->integer('month')->nullable();
            $table->integer('day')->nullable();
            $table->string('region')->nullable();
        });
        Schema::table('nes_releases', function ($table){
            $table->foreign('game_id')->references('id')->on('games');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nes_releases');
    }
}
