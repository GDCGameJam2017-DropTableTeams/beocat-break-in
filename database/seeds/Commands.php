<?php

use Illuminate\Database\Seeder;

class Commands extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('commands')->insert([
            ['name' => 'Go'],
            ['name' => 'Up'],
            ['name' => 'Down'],
            ['name' => 'North'],
            ['name' => 'South'],
            ['name' => 'East'],
            ['name' => 'West'],
            ['name' => 'In'],
            ['name' => 'Out'],
            ['name' => 'Look'],
            ['name' => 'Examine'],
            ['name' => 'Take'],
            ['name' => 'Drop'],
            ['name' => 'Kill'],
            ['name' => 'Wait'],
            ['name' => 'Wear'],
            ['name' => 'Use'],
            ['name' => 'Help'],
            ['name' => 'Inventory'],
            ['name' => 'Save'],
            ['name' => 'Load'],
            ['name' => 'Reset'],
            ['name' => 'Quit']
        ]);
    }
}
