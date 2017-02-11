<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('inventory', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('item_id')->unsigned();
        $table->integer('game_id')->unsigned();
        $table->integer('game_save_id')->unsigned();
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
        Schema::drop('inventory');
    }
}
