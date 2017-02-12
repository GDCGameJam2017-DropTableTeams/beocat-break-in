<?php

use Illuminate\Database\Seeder;

use App\Locations;
use App\Outs;

class OutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      $locations = Locations::all();

      $loc_values = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13);
      $in = array('out' => 'In');
      $up = array('out' => 'Up');
      $down = array('out' => 'Down');
      $north = array('out' => 'North');
      $south = array('out' => 'South');
      $east = array('out' => 'East');
      $west = array('out' => 'West');
      $out = array('out' => 'Out');

      //courtyard
      $loc = new Outs;
      $loc->out = $in['out'];
      $loc->locationId()->associate($locations[0]);
      $loc->nextLocationId()->associate($locations[1]);
      $loc->save();


      /******/
      //atrium
      $loc12 = new Outs;
      $loc12->out = $out['out'];
      $loc12->locationId()->associate($locations[$loc_values[1]]);
      $loc12->nextLocationId()->associate($locations[$loc_values[0]]); //courtyard
      $loc12->save();

      $loc13 = new Outs;
      $loc13->out = $up['out'];
      $loc13->locationId()->associate($locations[$loc_values[1]]);
      $loc13->nextLocationId()->associate($locations[$loc_values[9]]); //cs dept
      $loc13->save();

      $loc14 = new Outs;
      $loc14->out = $down['out'];
      $loc14->locationId()->associate($locations[$loc_values[1]]);
      $loc14->nextLocationId()->associate($locations[$loc_values[4]]); //lower atrium
      $loc14->save();

      $loc15 = new Outs;
      $loc15->out = $west['out'];
      $loc15->locationId()->associate($locations[$loc_values[1]]);
      $loc15->nextLocationId()->associate($locations[$loc_values[6]]); //long hallway
      $loc15->save();

      $loc16 = new Outs;
      $loc16->out = $south['out'];
      $loc16->locationId()->associate($locations[$loc_values[1]]);
      $loc16->nextLocationId()->associate($locations[$loc_values[2]]); // CHE dept
      $loc16->save();



      /*********/
      //CHE dept
      $loc2 = new Outs;
      $loc2->out = $north['out'];
      $loc2->locationId()->associate($locations[$loc_values[2]]);
      $loc2->nextLocationId()->associate($locations[$loc_values[1]]); //atrium
      $loc2->save();

      //CHE dept
      $loc3 = new Outs;
      $loc3->out = $south['out'];
      $loc3->locationId()->associate($locations[$loc_values[2]]);
      $loc3->nextLocationId()->associate($locations[$loc_values[3]]); //Chem Lab
      $loc3->save();



      /********/
      //chem lab
      $loc4 = new Outs;
      $loc4->out = $north['out'];
      $loc4->locationId()->associate($locations[$loc_values[3]]);
      $loc4->nextLocationId()->associate($locations[$loc_values[2]]); //CHE Dept
      $loc4->save();



      /*************/
      //lower atrium
      $loc5 = new Outs;
      $loc5->out = $up['out'];
      $loc5->locationId()->associate($locations[$loc_values[4]]);
      $loc5->nextLocationId()->associate($locations[$loc_values[1]]); //atrium
      $loc5->save();

      $loc6 = new Outs;
      $loc6->out = $down['out'];
      $loc6->locationId()->associate($locations[$loc_values[4]]);
      $loc6->nextLocationId()->associate($locations[$loc_values[5]]); //breaker room
      $loc6->save();



      /*************/
      //breaker room
      $loc7 = new Outs;
      $loc7->out = $up['out'];
      $loc7->locationId()->associate($locations[$loc_values[5]]);
      $loc7->nextLocationId()->associate($locations[$loc_values[4]]); //atrium
      $loc7->save();



      /*************/
      //long hallway
      $loc8 = new Outs;
      $loc8->out = $east['out'];
      $loc8->locationId()->associate($locations[$loc_values[6]]);
      $loc8->nextLocationId()->associate($locations[$loc_values[1]]); //atrium
      $loc8->save();

      $loc9 = new Outs;
      $loc9->out = $west['out'];
      $loc9->locationId()->associate($locations[$loc_values[6]]);
      $loc9->nextLocationId()->associate($locations[$loc_values[8]]); //server room
      $loc9->save();

      $loc22 = new Outs;
      $loc22->out = $north['out'];
      $loc22->locationId()->associate($locations[$loc_values[6]]);
      $loc22->nextLocationId()->associate($locations[$loc_values[7]]); //sas
      $loc22->save();



      /*************/
      //SAS
      $loc23 = new Outs;
      $loc23->out = $south['out'];
      $loc23->locationId()->associate($locations[$loc_values[7]]);
      $loc23->nextLocationId()->associate($locations[$loc_values[6]]); //long hallway
      $loc23->save();



      /*************/
      //Sever room
      $loc24 = new Outs;
      $loc24->out = $east['out'];
      $loc24->locationId()->associate($locations[$loc_values[8]]);
      $loc24->nextLocationId()->associate($locations[$loc_values[6]]); //
      $loc24->save();



      /*************/
      //cs dept
      $loc26 = new Outs;
      $loc26->out = $up['out'];
      $loc26->locationId()->associate($locations[$loc_values[9]]);
      $loc26->nextLocationId()->associate($locations[$loc_values[11]]); //ece dept
      $loc26->save();


      $loc25 = new Outs;
      $loc25->out = $down['out'];
      $loc25->locationId()->associate($locations[$loc_values[9]]);
      $loc25->nextLocationId()->associate($locations[$loc_values[1]]); //atrium
      $loc25->save();


      
      $loc27 = new Outs;
      $loc27->out = $east['out'];
      $loc27->locationId()->associate($locations[$loc_values[9]]);
      $loc27->nextLocationId()->associate($locations[$loc_values[10]]); //sys admin office
      $loc27->save();




      /*************/
      //sys admin office
      $loc31 = new Outs;
      $loc31->out = $west['out'];
      $loc31->locationId()->associate($locations[$loc_values[10]]);
      $loc31->nextLocationId()->associate($locations[$loc_values[9]]); //cs dept
      $loc31->save();



      /*************/
      //ece dept
      $loc32 = new Outs;
      $loc32->out = $down['out'];
      $loc32->locationId()->associate($locations[$loc_values[11]]);
      $loc32->nextLocationId()->associate($locations[$loc_values[9]]); //cs dept
      $loc32->save();

      $loc34 = new Outs;
      $loc34->out = $up['out'];
      $loc34->locationId()->associate($locations[$loc_values[11]]);
      $loc34->nextLocationId()->associate($locations[$loc_values[13]]); //roof
      $loc34->save();

      $loc35 = new Outs;
      $loc35->out = $west['out'];
      $loc35->locationId()->associate($locations[$loc_values[11]]);
      $loc35->nextLocationId()->associate($locations[$loc_values[12]]); //ece lab
      $loc35->save();



      /*************/
      //ece lab
      $loc36 = new Outs;
      $loc36->out = $east['out'];
      $loc36->locationId()->associate($locations[$loc_values[12]]);
      $loc36->nextLocationId()->associate($locations[$loc_values[11]]); //ece dept
      $loc36->save();




      /*************/
      //ece lab
      $loc37 = new Outs;
      $loc37->out = $down['out'];
      $loc37->locationId()->associate($locations[$loc_values[13]]);
      $loc37->nextLocationId()->associate($locations[$loc_values[11]]); //ece dept
      $loc37->save();




    }
}
