<?php

namespace Database\Factories;

use App\Models\Dream;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Dream>
 */
class DreamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'user_id'=>User::factory(), this is not great - good for frst run but from now on it should be users first and dreams second degree also to show the right relationship
            'user_id' => fake()->numberBetween(1,11), 
            'title'=>fake()->sentence(),
            'content'=>fake()->text(),
            'is_public'=>fake()->boolean(),
        ];
    }
}
