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
            ['name' => 'Engineering Courtyard', 'properties' => 'You are standing in the courtyard of ENGINEERING. There is a leaf blower here.', 'outs' => 'In'],
            ['name' => 'Engineering Atrium', 'properties' => 'You are standing in the middle of the new atrium. There is a large staircase here.', 'outs' => 'South, West, Up, Down, Out'],
            ['name' => 'Chemical Engineering Department', 'properties' => 'You are standing in the Chemical Engineering department. ', 'outs' => 'North, South'],
            ['name' => 'Chemistry Lab', 'properties' => 'You are standing in a Chemical Laboratory. There is a siphon pump here.', 'outs' => 'North'],
            ['name' => 'Lower Atrium', 'properties' => 'You are standing in the middle of the lower atrium. The Powercat Motorsports formula car is here', 'outs' => 'Up, Down'],
            ['name' => 'Breaker Room', 'properties' => 'You are standing in the breaker room of ENGINEERING. The room is dimly lit and is covered in cobwebs.', 'outs' => 'Up'],
            ['name' => 'Long Hallway', 'properties' => 'You are standing in a long hallway.', 'outs' => 'North, East, West'],
            ['name' => 'Sass', 'properties' => 'You are standing in the SAS Tutoring room.', 'outs' => 'South'],
            ['name' => 'Server Room', 'properties' => 'You are standing in the server room of ENGINEERING. The backup generator failed and it’s pitch black. It’s 2 spooky 4 u so you leave the room.', 'outs' => 'East'],
            ['name' => 'Computer Science Department', 'properties' => 'You are standing in the Computer Science department. There is a large staircase and laptop here.', 'outs' => 'Up, East'],
            ['name' => 'System Administration Office', 'properties' => 'You are standing in your office. There are networking cables here.', 'outs' => 'West'],
            ['name' => 'E C E Department', 'properties' => 'You are standing in the Electrical and Computer Engineering department.', 'outs' => 'West, Up, Down'],
            ['name' => 'E C E Lab', 'properties' => 'You are standing in the Electrical and Computer Engineering lab. There is a soldering iron and a fuse here.', 'outs' => 'East'],
            ['name' => 'Roof', 'properties' => 'You are standing on the roof of ENGINEERING. There are air vents here.', 'outs' => 'Down']

        ]);
    }
}
