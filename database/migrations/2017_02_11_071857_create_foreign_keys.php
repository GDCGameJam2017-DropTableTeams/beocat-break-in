<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('inventory', function($table) {
        $table->foreign('item_id')->references('id')->on('items');
        $table->foreign('game_id')->references('id')->on('games');
        $table->foreign('game_save_id')->references('id')->on('game_saves');
      });

      Schema::table('games', function($table) {
        $table->foreign('current_location')->references('id')->on('locations');
      });

      Schema::table('text_commands', function($table) {
        $table->foreign('game_id')->references('id')->on('games');
      });

      Schema::table('items', function($table) {
        $table->foreign('location_id')->references('id')->on('locations');
      });

      Schema::table('item_interactions', function($table) {
        $table->foreign('item_one_id')->references('id')->on('items');
        $table->foreign('item_two_id')->references('id')->on('games');
      });

      Schema::table('environment_interactions', function($table) {
        $table->foreign('game_id')->references('id')->on('games');
        $table->foreign('item_one_id')->references('id')->on('items');
        $table->foreign('item_two_id')->references('id')->on('items');
      });

      Schema::table('game_saves', function($table) {
        $table->foreign('game_id')->references('id')->on('games');
        $table->foreign('current_location')->references('id')->on('locations');
      });

      Schema::table('outs', function($table) {
        $table->foreign('location_id')->references('id')->on('locations');
        $table->foreign('next_location_id')->references('id')->on('locations');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
