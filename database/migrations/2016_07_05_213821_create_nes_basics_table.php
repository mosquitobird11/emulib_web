<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNesBasicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nes_basics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('game_id');
            $table->string('short')->nullable();
            $table->text('long')->nullable();
        });
        Schema::table('nes_basics', function ($table){
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
        Schema::drop('nes_basics');
    }
}
