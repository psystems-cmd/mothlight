<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Dream;

/**
 * @extends Factory<Comment>
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
            'user_id' => User::inRandomOrder()->first()->id, //this now is a real db lookup, nicer than having all fake
            'dream_id' => Dream::inRandomOrder()->first()->id, //this now is a real db lookup, nicer than having all fake
            'content'=>fake()->realText(80),
        ];
    }
}
