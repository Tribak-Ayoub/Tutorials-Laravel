<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            PostSeeder::class,
        ]);
        // \App\Models\Category::factory(3)->create();
        // \App\Models\Post::factory(10)->create();
    }
}
