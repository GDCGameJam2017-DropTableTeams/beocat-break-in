<?php

use Illuminate\Database\Seeder;

use App\LocationItems;
use App\Locations;
use App\Items;

class LocationItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $locations = Locations::get();
      $items = Items::get();
      $locations_rows = array(0, 9, 10, 12, 12, 3, 8);
      $items_rows = array(8, 11, 12, 13, 6, 1, 15);

      //leaf blower
      $location_item = new LocationItems;
      $location_item->properties = 'There is a leaf blower here';
      $location_item->location()->associate($locations[$locations_rows[0]]);
      $location_item->item()->associate($items[$items_rows[0]]);
      $location_item->save();

      //laptop
      $location_item2 = new LocationItems;
      $location_item2->properties = 'There is a laptop here';
      $location_item2->location()->associate($locations[$locations_rows[1]]);
      $location_item2->item()->associate($items[$items_rows[1]]);
      $location_item2->save();

      //networking cables
      $location_item3 = new LocationItems;
      $location_item3->properties = 'There are networking cables here';
      $location_item3->location()->associate($locations[$locations_rows[2]]);
      $location_item3->item()->associate($items[$items_rows[2]]);
      $location_item3->save();

      //soldering iron
      $location_item4 = new LocationItems;
      $location_item4->properties = 'There is a soldering iron here';
      $location_item4->location()->associate($locations[$locations_rows[3]]);
      $location_item4->item()->associate($items[$items_rows[3]]);
      $location_item4->save();

      //200A fuse
      $location_item5 = new LocationItems;
      $location_item5->properties = 'There is a fuse here';
      $location_item5->location()->associate($locations[$locations_rows[4]]);
      $location_item5->item()->associate($items[$items_rows[4]]);
      $location_item5->save();

      //siphon pump
      $location_item6 = new LocationItems;
      $location_item6->properties = 'There is a siphon pump here';
      $location_item6->location()->associate($locations[$locations_rows[5]]);
      $location_item6->item()->associate($items[$items_rows[5]]);
      $location_item6->save();

      //200A fuse
      $location_item6 = new LocationItems;
      $location_item6->properties = 'The backup generator failed and it’s pitch black. It’s 2 spooky 4 u so you leave the room';
      $location_item6->location()->associate($locations[$locations_rows[6]]);
      $location_item6->item()->associate($items[$items_rows[6]]);
      $location_item6->save();



    }
}
