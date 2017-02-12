<?php

use Illuminate\Database\Seeder;

use App\ItemInteractions;
use App\Items;

class ItemInteractionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $test = Items::where('name', 'Leaf Blower')->first();
      $test1 = Items::where('name', 'Air vents')->first();

      $item_interactions1 = new ItemInteractions;
      $item_interactions1->result = 'You use the leaf blower on the air vents and remove the lint clogging them.';
      $item_interactions1->itemOne()->associate($test);
      $item_interactions1->itemTwo()->associate($test1);
      $item_interactions1->save();

    }
}
