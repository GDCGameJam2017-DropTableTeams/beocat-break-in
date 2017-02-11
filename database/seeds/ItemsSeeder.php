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

      $locations = Locations::get(); //do a get() here instead of a first() then loop through

      $values = array(0, 4, 8, 9, 10, 12, 13);
      $one = array('name' => 'Leaf Blower', 'properties' => 'The leaf blower is a standard leaf blower and has no gas.', 'environment_interaction' => 0);
      $five = array('name' => 'Formula One Car', 'properties' => 'You look in the gas tank and see that it’s full of gas.', 'environment_interaction' => 0);
      $nine = array('name' => 'Beocat', 'properties' => 'The supercomputer looks to be in bad shape.', 'environment_interaction' => 0);
      $ten = array('name' => 'Laptop', 'properties' => 'The laptop is running windows vista but looks usable', 'environment_interaction' => 0);
      $eleven = array('name' => 'Networking Cables', 'properties' => 'A bundle of networking cables', 'environment_interaction' => 0);
      $thirteen = array('name' => 'Soldering Iron', 'properties' => 'A soldering iron that is ready to be used', 'environment_interaction' => 0);
      $fourteen = array('name' => 'Air Vents', 'properties' => 'A ventilation system useful for removing fumes from the building.', 'environment_interaction' => 0);



        $item1 = new Items;
        $item1->name = $one['name'];
        $item1->properties = $one['properties'];
        $item1->environment_interaction = $one['environment_interaction'];
        $item1->location()->associate($locations[$values[0]]);
        $item1->save();

        $item2 = new Items;
        $item2->name = $five['name'];
        $item2->properties = $five['properties'];
        $item2->environment_interaction = $five['environment_interaction'];
        $item2->location()->associate($locations[$values[1]]);
        $item2->save();

        $item3 = new Items;
        $item3->name = $nine['name'];
        $item3->properties = $nine['properties'];
        $item3->environment_interaction = $nine['environment_interaction'];
        $item3->location()->associate($locations[$values[2]]);
        $item3->save();

        $item4 = new Items;
        $item4->name = $ten['name'];
        $item4->properties = $ten['properties'];
        $item4->environment_interaction = $ten['environment_interaction'];
        $item4->location()->associate($locations[$values[3]]);
        $item4->save();

        $item5 = new Items;
        $item5->name = $eleven['name'];
        $item5->properties = $eleven['properties'];
        $item5->environment_interaction = $eleven['environment_interaction'];
        $item5->location()->associate($locations[$values[4]]);
        $item5->save();

        $item6 = new Items;
        $item6->name = $thirteen['name'];
        $item6->properties = $thirteen['properties'];
        $item6->environment_interaction = $thirteen['environment_interaction'];
        $item6->location()->associate($locations[$values[5]]);
        $item6->save();

        $item7 = new Items;
        $item7->name = $fourteen['name'];
        $item7->properties = $fourteen['properties'];
        $item7->environment_interaction = $fourteen['environment_interaction'];
        $item7->location()->associate($locations[$values[6]]);
        $item7->save();

    }
}
