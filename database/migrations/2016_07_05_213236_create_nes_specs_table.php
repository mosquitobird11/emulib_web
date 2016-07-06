<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNesSpecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nes_specs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('game_id');
            $table->integer('mapper_number')->nullable();
            $table->string('mapper_name')->nullable();
            $table->string('prg')->nullable();
            $table->string('chr')->nullable();
            $table->integer('mirroring')->nullable();
        });
        Schema::table('nes_specs', function ($table){
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
        Schema::drop('nes_specs');
    }
}
