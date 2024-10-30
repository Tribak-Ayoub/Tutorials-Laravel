<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use League\Csv\Reader;

class CategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        // Load the CSV file
        // $csv = Reader::createFromPath(database_path('seeders/categories.csv'));
        // $csv->setHeaderOffset(0); // Set the first row as the header

        // // Iterate over the CSV records
        // foreach ($csv as $record) {
        //     Category::create([
        //         'name' => $record['name'],
        //         'description' => $record['description'],
        //     ]);
        // }
        \App\Models\Category::factory()->count(10)->create();
        \App\Models\Category::factory()->count(5)->create();
    }
}
