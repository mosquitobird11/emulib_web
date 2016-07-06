<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNesAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nes_achievements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('game_id');
            $table->integer('neslocker_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('picture_locked')->nullable();
            $table->string('picture_unlocked')->nullable();
        });
        Schema::table('nes_achievements', function ($table){
            $table->foreign('game_id')->references('id')->on('games');
            $table->foreign('neslocker_id')->references('id')->on('neslockers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nes_achievements');
    }
}
