<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;
use App\Models\Post;

class CreatePost extends Command
{
    protected $signature = 'create:post';

    protected $description = 'Create a new post';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $title = $this->ask("Enter the post title");
        $body = $this->ask("Enter the post content");
        $categories = Category::all();

        if($categories->isEmpty()){
            $this->info("No categories found. Let's create a new one.");
            $categoryName = $this->ask("Enter the new category name");
            $category = Category::create(['name' => $categoryName]);
        }else{
            $this->info("Available categories:");
            foreach($categories as $index => $category){
                $this->line("[{$category->id}] {$category->name}");
            }
        }

        $categoryId = $this->ask("Enter the ID of the category or type 'new' to create one");
        if($categoryId === 'new'){
            $categoryName = $this->ask("Enter the new category name");
            $category = Category::create(['name' => $categoryName]);
        }else{
            $category = Category::find($categoryId);
            if(!$categoryId){
                $this->error("Category ID {$categoryId} not found. Exiting.");
                return;
            }
        }

        $post = Post::create([
            'title' => $title,
            'body' => $body,
            'category_id' => $category->id,
        ]);

        $this->info("Post '{$title}' created successfully under category '{$category->name}'!");
    }
}
