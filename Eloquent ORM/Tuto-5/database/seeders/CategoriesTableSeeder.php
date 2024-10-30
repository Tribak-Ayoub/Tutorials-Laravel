<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Category::factory()->count(10)->create();           // 10 random categories
        \App\Models\Category::factory()->count(5)->active()->create();  // 5 active categories
    }
}
