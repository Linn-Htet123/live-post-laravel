<?php

namespace Database\Factories;

use App\Models\User;
use Database\Factories\Helpers\factoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [
            'body' => [],
            'user_id' => factoryHelper::getRandomModelId(User::class),
            'post_id' => factoryHelper::getRandomModelId(Post::class),
        ];
    }
}
