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
      $test1 = Items::where('name', 'Air Vents')->first();
      $item_interactions1 = new ItemInteractions;
      $item_interactions1->result = 'You use the leaf blower on the air vents and remove the lint clogging them.';
      $item_interactions1->itemOne()->associate($test);
      $item_interactions1->itemTwo()->associate($test1);
      $item_interactions1->save();

      $btest = Items::where('name', 'Siphon Pump')->first();
      $btest1 = Items::where('name', 'Formula One Car')->first();
      $bitem_interactions1 = new ItemInteractions;
      $bitem_interactions1->result = 'You use the siphon pump to remove gas from the formula one car.';
      $bitem_interactions1->itemOne()->associate($btest);
      $bitem_interactions1->itemTwo()->associate($btest1);
      $bitem_interactions1->save();

      $ctest = Items::where('name', 'Beocat')->first();
      $ctest1 = Items::where('name', 'Networking Cables')->first();
      $citem_interactions1 = new ItemInteractions;
      $citem_interactions1->result = 'You cut the networking cables attached to beocat.';
      $citem_interactions1->itemOne()->associate($ctest);
      $citem_interactions1->itemTwo()->associate($ctest1);
      $citem_interactions1->save();

      $dtest = Items::where('name', 'Ventilation System Switch')->first();
      $dtest1 = Items::where('name', 'Air Vents')->first();
      $ditem_interactions1 = new ItemInteractions;
      $ditem_interactions1->result = 'You turn the ventilation switch to the on position and it starts running.';
      $ditem_interactions1->itemOne()->associate($dtest);
      $ditem_interactions1->itemTwo()->associate($dtest1);
      $ditem_interactions1->save();


    }
}
