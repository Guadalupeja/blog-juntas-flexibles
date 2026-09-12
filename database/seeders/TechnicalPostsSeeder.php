<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class TechnicalPostsSeeder extends Seeder
{
    public function run(): void
    {
        $posts = json_decode(
            file_get_contents(database_path('seeders/data/technical-posts.json')),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        foreach ($posts as $post) {
            Post::updateOrCreate(
                ['slug' => $post['slug']],
                $post
            );
        }
    }
}