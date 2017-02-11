<?php

use Illuminate\Database\Seeder;
use App\Locations;
use App\Items;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $location1 = Locations::where('id', 1)->first();
      $item1 = new Items;
      $item1->name = "Leaf Blower";
      $item1->properties = "POOP";
      $item1->environment_interaction = 1;
      $item1->location()->associate($location1);
      $item1->save();

    }
}
