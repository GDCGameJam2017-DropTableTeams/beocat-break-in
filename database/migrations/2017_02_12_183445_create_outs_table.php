<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('outs', function (Blueprint $table) {
        $table->increments('id');
        $table->string('out');
        $table->integer('location_id')->unsigned();
        $table->integer('next_location_id')->unsigned();
        $table->timestamps();
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
      Schema::disableForeignKeyConstraints();
      Schema::drop('outs');
    }
}
