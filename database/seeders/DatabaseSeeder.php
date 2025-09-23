<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Asset;
use App\Models\Category;
use App\Models\Location;
use App\Models\Manufacturer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(UserSeeder::class);

        User::factory(20)->create();
        Manufacturer::factory(10)->create();
        Category::factory(10)->create();
        Location::factory(10)->create();
        Asset::factory(100)->create();
        
    }
}
