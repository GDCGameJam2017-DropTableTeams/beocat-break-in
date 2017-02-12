<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemInteractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('item_interactions', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('item_one_id')->unsigned();
        $table->integer('item_two_id')->unsigned();
        $table->string('result');
        $table->timestamps();
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
        Schema::drop('item_interactions');
    }
}
