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
            ['name' => ''],
            ['name' => ''],

        ]);
    }
}
