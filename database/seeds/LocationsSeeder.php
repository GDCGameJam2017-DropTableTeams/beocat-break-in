<?php

use Illuminate\Database\Seeder;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('Locations')->insert([
            ['name' => 'Engineering Courtyard', 'properties' => '', 'outs' => ''],
            ['name' => 'Engineering Atrium', 'properties' => '', 'outs' => ''],
            ['name' => 'Chemical Engineering Department', 'properties' => '', 'outs' => ''],
            ['name' => 'Chemistry Lab', 'properties' => '', 'outs' => ''],
            ['name' => 'Lower Atrium', 'properties' => '', 'outs' => ''],
            ['name' => 'Breaker Room', 'properties' => '', 'outs' => ''],
            ['name' => 'Long Hallway', 'properties' => '', 'outs' => ''],
            ['name' => 'Sass', 'properties' => '', 'outs' => ''],
            ['name' => 'Server Room', 'properties' => '', 'outs' => ''],
            ['name' => 'Computer Science Department', 'properties' => '', 'outs' => ''],
            ['name' => 'System Administration Office', 'properties' => '', 'outs' => ''],
            ['name' => 'E C E Department', 'properties' => '', 'outs' => ''],
            ['name' => 'E C E Lab', 'properties' => '', 'outs' => ''],
            ['name' => 'Roof', 'properties' => '', 'outs' => ''],

        ]);
    }
}
