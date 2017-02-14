<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(Commands::class);
        $this->call(LocationsSeeder::class);
        $this->call(ItemsSeeder::class);
        $this->call(ItemInteractionsSeeder::class);
        $this->call(Commands::class);
        $this->call(OutTableSeeder::class);
        $this->call(LocationItemsSeeder::class);

    }
}
