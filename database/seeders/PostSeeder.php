<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Database\Factories\Helpers\factoryHelper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::factory(3)
//            ->has(Comment::factory(3),'comments')
            ->create();

        $posts->each(function (Post $post){
            $post->users()->sync([factoryHelper::getRandomModelId(User::class)]);
        });
    }
}
