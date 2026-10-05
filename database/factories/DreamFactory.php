<?php

namespace Database\Factories;

use App\Models\Dream;
use App\Models\User;
use App\Models\Pattern;
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
            //'user_id' => fake()->numberBetween(1,11), --> Claude had the Idea to use the existing Users in Random Order to get rid of the risk of deleted users etc in a potential demo with nico 
            'user_id' => User::inRandomOrder()->first()->id, //this now is a real db lookup, nicer than having all fake
            'title'=>fake()->sentence(),
            'description'=>fake()->text(),
            'tldr'=>fake()->sentence(),
            'pattern'=>Pattern::inRandomOrder()->first()->name,
            'woke_after'=>fake()->boolean(),
            'dreamt_at' => now()->subDays(fake()->numberBetween(1,7))->setTime(fake()->randomElement([22,23,0,1,2,3,4,5,6,7,8]),fake()->randomElement([0,30])), //adds a datetime element to the dream to give a user estimate of when a dream was dreamed, even if recording a few days later. 
            'is_public'=>fake()->boolean(),
        ];
    }
}
