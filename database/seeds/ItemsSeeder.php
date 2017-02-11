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

      

      DB::table('items')->insert([
            ['name' => 'Leaf Blower', 'properties' => '', 'environment_interaction' => '1', 'location_id' => '')],



        ]);
    }
}
