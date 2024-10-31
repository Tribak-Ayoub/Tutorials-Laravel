<?php

namespace App\Console\Commands;
use App\Models\Post;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ShowPosts extends Command
{
    protected $signature = 'show:posts';

    protected $description = 'Display all posts with their titles, content, and categories';

    public function handle()
    {
        $posts = Post::with('category')->get();

        if($posts->isEmpty()){
            $this->info("No posts found.");
            return;
        }

        $this->table(
            ['ID', 'Title', 'Body', 'Category'], // Table headers
            $posts->map(function ($post) {          // Map posts to table rows
                return [
                    'ID'       => $post->id,
                    'Title'    => $post->title,
                    'Body'  => Str::limit($post->body, 50), 
                    'Category' => $post->category->name ?? 'No Category',
                ];
            })->toArray()
        );

    }
}
