<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersNesAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_nes_achievements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('nes_achievement_id');
            $table->boolean('unlocked');
            $table->dateTime('unlocked_at');
        });
        Schema::table('users_nes_achievements', function ($table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('nes_achievement_id')->references('id')->on('nes_achievements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_nes_achievements');
    }
}
