<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters_games', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('character_id');
            $table->integer('game_id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('picture')->nullable();
        });
        Schema::table('characters_games', function ($table){
            $table->foreign('game_id')->references('id')->on('games');
            $table->foreign('character_id')->references('id')->on('characters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('characters_games');
    }
}
