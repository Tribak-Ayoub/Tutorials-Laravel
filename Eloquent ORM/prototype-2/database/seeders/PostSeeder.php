<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $technology = Category::where('name', 'Technology')->first();
        $education = Category::where('name', 'Education')->first();

        Post::create([
            'title' => 'first post',
            'body' => 'first post body',
            'category_id' => $technology->id,
        ]);

        Post::create([
            'title' => 'second post',
            'body' => 'second post body',
            'category_id' => $education->id,
        ]);
    }
}
