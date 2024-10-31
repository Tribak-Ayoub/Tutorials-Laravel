<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;

class CreateCategory extends Command
{
    protected $signature = 'create:category {name}';

    protected $description = 'Create a new category';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        $category = Category::create(['name' => $name]);

        $this->info("Category '{$name}' created successfully!");
    }
}
