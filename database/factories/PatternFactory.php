<?php

namespace Database\Factories;

use App\Models\Pattern;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pattern>
 */
class PatternFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement(
                [
                    'Falling',
                    'Being chased',
                    'Teeth falling out',
                    'Flying',
                    'Being naked in public',
                    'Late for an exam',
                    'Lost in a building',
                    'Unable to move',
                    'Drowning',
                    'Losing your phone',
                    'Missing a train',
                    'Back at school',
                    'Meeting someone who died',
                    'Endless stairs',
                    'Can\'t find a toilet',
                    'Car without brakes',
                    'Being unable to scream',
                    'Ex shows up',
                    'House with extra rooms',
                    'Animals talking',
                    'Natural disaster',
                    'Being pregnant',
                    'Lucid dreaming',
                    'Forgetting how to read',
                    'Hiding from someone',
                ]
            ),
        ];
    }
}
