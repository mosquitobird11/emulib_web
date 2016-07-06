<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNesHashsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nes_hashs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('game_id');
            $table->string('hash_type');
            $table->string('hash');
            $table->string('variation_name')->nullable();
            $table->text('description')->nullable();
        });
        Schema::table('nes_hashs', function ($table){
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
        Schema::drop('nes_hashs');
    }
}
