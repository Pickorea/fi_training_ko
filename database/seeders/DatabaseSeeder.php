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
        $this->call(NavbarSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(IslandSeeder::class);
        $this->call(TrainingTypeSeeder::class);
        $this->call(VillageSeeder::class);
        $this->call(UrlSeeder::class);
    }
}
