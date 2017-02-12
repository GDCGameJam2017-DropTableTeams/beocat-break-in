<?php

use Illuminate\Database\Seeder;

class OutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      $locations = Locations::get();

      $loc_values = array(0, 3, 4, 8, 8, 8, 12, 13);
      $env_one = array('out' => '');

      $loc = new Outs;
      $loc->name = $env_one['out'];
      $loc->locationId()->associate($locations[$loc_values[0]]);
      $loc->nextLocationId()->associate($locations[$loc_values[0]]);
      $loc->save();

    }
}
