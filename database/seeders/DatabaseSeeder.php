<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(15)->create();
        \App\Models\Category::factory(3)->create();
        \App\Models\Room::factory(15)->create();
        \App\Models\Payment::factory(15)->create();
        \App\Models\Booking::factory(15)->create();
        \App\Models\Review::factory(15)->create();
    }
}
