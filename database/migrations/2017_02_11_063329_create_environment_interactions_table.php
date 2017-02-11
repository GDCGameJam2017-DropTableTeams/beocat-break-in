<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnvironmentInteractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('environment_interactions', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('game_id')->unsigned();
        $table->integer('item_one')->unsigned();
        $table->integer('item_two')->unsigned();
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::drop('environment_interactions');
    }
}
