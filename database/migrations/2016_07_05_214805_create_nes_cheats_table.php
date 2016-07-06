<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNesCheatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nes_cheats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('game_id');
            $table->string('name');
            $table->string('value');
            $table->text('description')->nullable();
        });
        Schema::table('nes_cheats', function ($table){
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
        Schema::drop('nes_cheats');
    }
}
