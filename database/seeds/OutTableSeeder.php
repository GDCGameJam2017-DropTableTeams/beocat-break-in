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
      $loc->name = $in['out'];
      $loc->locationId()->associate($locations[$loc_values[0]]);
      $loc->nextLocationId()->associate($locations[$loc_values[1]]);
      $loc->save();


      /******/
      //atrium
      $loc1 = new Outs;
      $loc1->name = $out['out'];
      $loc1->locationId()->associate($locations[$loc_values[1]]);
      $loc1->nextLocationId()->associate($locations[$loc_values[0]]); //courtyard
      $loc1->save();

      $loc1 = new Outs;
      $loc1->name = $up['out'];
      $loc1->locationId()->associate($locations[$loc_values[1]]);
      $loc1->nextLocationId()->associate($locations[$loc_values[9]]); //cs dept
      $loc1->save();

      $loc1 = new Outs;
      $loc1->name = $down['out'];
      $loc1->locationId()->associate($locations[$loc_values[1]]);
      $loc1->nextLocationId()->associate($locations[$loc_values[4]]); //lower atrium
      $loc1->save();

      $loc1 = new Outs;
      $loc1->name = $west['out'];
      $loc1->locationId()->associate($locations[$loc_values[1]]);
      $loc1->nextLocationId()->associate($locations[$loc_values[6]]); //long hallway
      $loc1->save();

      $loc1 = new Outs;
      $loc1->name = $south['out'];
      $loc1->locationId()->associate($locations[$loc_values[1]]);
      $loc1->nextLocationId()->associate($locations[$loc_values[2]]); // CHE dept
      $loc1->save();



      /*********/
      //CHE dept
      $loc = new Outs;
      $loc->name = $north['out'];
      $loc->locationId()->associate($locations[$loc_values[2]]);
      $loc->nextLocationId()->associate($locations[$loc_values[1]]); //atrium
      $loc->save();

      //CHE dept
      $loc = new Outs;
      $loc->name = $south['out'];
      $loc->locationId()->associate($locations[$loc_values[2]]);
      $loc->nextLocationId()->associate($locations[$loc_values[3]]); //Chem Lab
      $loc->save();



      /********/
      //chem lab
      $loc = new Outs;
      $loc->name = $north['out'];
      $loc->locationId()->associate($locations[$loc_values[3]]);
      $loc->nextLocationId()->associate($locations[$loc_values[2]]); //CHE Dept
      $loc->save();



      /*************/
      //lower atrium
      $loc = new Outs;
      $loc->name = $up['out'];
      $loc->locationId()->associate($locations[$loc_values[4]]);
      $loc->nextLocationId()->associate($locations[$loc_values[1]]); //atrium
      $loc->save();

      $loc = new Outs;
      $loc->name = $down['out'];
      $loc->locationId()->associate($locations[$loc_values[4]]);
      $loc->nextLocationId()->associate($locations[$loc_values[5]]); //breaker room
      $loc->save();



      /*************/
      //breaker room
      $loc = new Outs;
      $loc->name = $up['out'];
      $loc->locationId()->associate($locations[$loc_values[5]]);
      $loc->nextLocationId()->associate($locations[$loc_values[4]]); //atrium
      $loc->save();



      /*************/
      //long hallway
      $loc = new Outs;
      $loc->name = $east['out'];
      $loc->locationId()->associate($locations[$loc_values[6]]);
      $loc->nextLocationId()->associate($locations[$loc_values[1]]); //atrium
      $loc->save();

      $loc = new Outs;
      $loc->name = $west['out'];
      $loc->locationId()->associate($locations[$loc_values[6]]);
      $loc->nextLocationId()->associate($locations[$loc_values[8]]); //server room
      $loc->save();

      $loc = new Outs;
      $loc->name = $north['out'];
      $loc->locationId()->associate($locations[$loc_values[6]]);
      $loc->nextLocationId()->associate($locations[$loc_values[7]]); //sas
      $loc->save();



      /*************/
      //SAS
      $loc = new Outs;
      $loc->name = $south['out'];
      $loc->locationId()->associate($locations[$loc_values[7]]);
      $loc->nextLocationId()->associate($locations[$loc_values[6]]); //long hallway
      $loc->save();



      /*************/
      //Sever room
      $loc = new Outs;
      $loc->name = $east['out'];
      $loc->locationId()->associate($locations[$loc_values[8]]);
      $loc->nextLocationId()->associate($locations[$loc_values[6]]); //
      $loc->save();



      /*************/
      //cs dept
      $loc = new Outs;
      $loc->name = $down['out'];
      $loc->locationId()->associate($locations[$loc_values[9]]);
      $loc->nextLocationId()->associate($locations[$loc_values[1]]); //atrium
      $loc->save();

      $loc = new Outs;
      $loc->name = $up['out'];
      $loc->locationId()->associate($locations[$loc_values[9]]);
      $loc->nextLocationId()->associate($locations[$loc_values[11]]); //ece dept
      $loc->save();

      $loc = new Outs;
      $loc->name = $east['out'];
      $loc->locationId()->associate($locations[$loc_values[9]]);
      $loc->nextLocationId()->associate($locations[$loc_values[10]]); //sys admin office
      $loc->save();




      /*************/
      //sys admin office
      $loc = new Outs;
      $loc->name = $west['out'];
      $loc->locationId()->associate($locations[$loc_values[10]]);
      $loc->nextLocationId()->associate($locations[$loc_values[9]]); //cs dept
      $loc->save();



      /*************/
      //ece dept
      $loc = new Outs;
      $loc->name = $down['out'];
      $loc->locationId()->associate($locations[$loc_values[11]]);
      $loc->nextLocationId()->associate($locations[$loc_values[9]]); //cs dept
      $loc->save();

      $loc = new Outs;
      $loc->name = $up['out'];
      $loc->locationId()->associate($locations[$loc_values[11]]);
      $loc->nextLocationId()->associate($locations[$loc_values[13]]); //roof
      $loc->save();

      $loc = new Outs;
      $loc->name = $west['out'];
      $loc->locationId()->associate($locations[$loc_values[11]]);
      $loc->nextLocationId()->associate($locations[$loc_values[12]]); //ece lab
      $loc->save();



      /*************/
      //ece lab
      $loc = new Outs;
      $loc->name = $east['out'];
      $loc->locationId()->associate($locations[$loc_values[12]]);
      $loc->nextLocationId()->associate($locations[$loc_values[11]]); //ece dept
      $loc->save();




      /*************/
      //ece lab
      $loc = new Outs;
      $loc->name = $down['out'];
      $loc->locationId()->associate($locations[$loc_values[13]]);
      $loc->nextLocationId()->associate($locations[$loc_values[11]]); //ece dept
      $loc->save();
    }
}
