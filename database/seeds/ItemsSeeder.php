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

      $locations = Locations::get();

      $values = array(0, 4, 8, 9, 10, 12, 13);
      $one = array('name' => 'Leaf Blower', 'properties' => 'The leaf blower is a standard leaf blower and has no gas.', 'environment_interaction' => 0);
      $five = array('name' => 'Formula One Car', 'properties' => 'You look in the gas tank and see that it’s full of gas.', 'environment_interaction' => 0);
      $nine = array('name' => 'Beocat', 'properties' => 'The supercomputer looks to be in bad shape.', 'environment_interaction' => 0);
      $ten = array('name' => 'Laptop', 'properties' => 'The laptop is running windows vista but looks usable', 'environment_interaction' => 0);
      $eleven = array('name' => 'Networking Cables', 'properties' => 'A bundle of networking cables', 'environment_interaction' => 0);
      $thirteen = array('name' => 'Soldering Iron', 'properties' => 'A soldering iron that is ready to be used', 'environment_interaction' => 0);
      $fourteen = array('name' => 'Air Vents', 'properties' => 'A ventilation system useful for removing fumes from the building.', 'environment_interaction' => 0);

      $env_values = array(0, 3, 4, 8, 8, 8, 12, 13);
      $env_one = array('name' => 'Empty Gas Tank', 'properties' => 'An empty gas tank.', 'environment_interaction' => 1);
      $env_four = array('name' => 'Siphon Pump', 'properties' => 'A pumped used to remove liquid from one container to another.', 'environment_interaction' => 1);
      $env_five = array('name' => 'Full Gas Tank', 'properties' => 'A full gas tank.', 'environment_interaction' => 1);
      $env_nine_a = array('name' => 'Pentafluoroethane Gas', 'properties' => '', 'environment_interaction' => 1);
      $env_nine_b = array('name' => 'Networking cables', 'properties' => 'A bundle of networking cables.', 'environment_interaction' => 1);
      $env_nine_c = array('name' => 'Ventilation System Switch', 'properties' => 'A switch to turn on and off the ventilation system.', 'environment_interaction' => 1);
      $env_thirteen = array('name' => '200 Amp Fuse', 'properties' => 'An unused 200A main fuse.', 'environment_interaction' => 1);
      $env_fourteen = array('name' => 'Air vents', 'properties' => 'A ventilation system useful for removing fumes from the building.', 'environment_interaction' => 1);



      $env_item1 = new Items;
      $env_item1->name = $env_one['name'];
      $env_item1->properties = $env_one['properties'];
      $env_item1->environment_interaction = $env_one['environment_interaction'];
      $env_item1->location()->associate($locations[$env_values[0]]);
      $env_item1->save();

      $env_item2 = new Items;
      $env_item2->name = $env_four['name'];
      $env_item2->properties = $env_four['properties'];
      $env_item2->environment_interaction = $env_four['environment_interaction'];
      $env_item2->location()->associate($locations[$env_values[1]]);
      $env_item2->save();

      $item3 = new Items;
      $item3->name = $env_five['name'];
      $item3->properties = $env_five['properties'];
      $item3->environment_interaction = $env_five['environment_interaction'];
      $item3->location()->associate($locations[$env_values[2]]);
      $item3->save();

      $env_item4 = new Items;
      $env_item4->name = $env_nine_a['name'];
      $env_item4->properties = $env_nine_a['properties'];
      $env_item4->environment_interaction = $env_nine_a['environment_interaction'];
      $env_item4->location()->associate($locations[$env_values[3]]);
      $env_item4->save();

      $env_item5 = new Items;
      $env_item5->name = $env_nine_b['name'];
      $env_item5->properties = $env_nine_b['properties'];
      $env_item5->environment_interaction = $env_nine_b['environment_interaction'];
      $env_item5->location()->associate($locations[$env_values[4]]);
      $env_item5->save();

      $env_item6 = new Items;
      $env_item6->name = $env_nine_c['name'];
      $env_item6->properties = $env_nine_c['properties'];
      $env_item6->environment_interaction = $env_nine_c['environment_interaction'];
      $env_item6->location()->associate($locations[$env_values[5]]);
      $env_item6->save();

      $env_item7 = new Items;
      $env_item7->name = $env_thirteen['name'];
      $env_item7->properties = $env_thirteen['properties'];
      $env_item7->environment_interaction = $env_thirteen['environment_interaction'];
      $env_item7->location()->associate($locations[$env_values[6]]);
      $env_item7->save();

      $env_item8 = new Items;
      $env_item8->name = $env_fourteen['name'];
      $env_item8->properties = $env_fourteen['properties'];
      $env_item8->environment_interaction = $env_fourteen['environment_interaction'];
      $env_item8->location()->associate($locations[$env_values[7]]);
      $env_item8->save();







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
