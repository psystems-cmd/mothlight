<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pattern;
use App\Models\Dream;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Mia Maria',
            'email' => 'mia@mothlight.test',
            'password' => 'Password3000',
            'is_admin' => true
        ]);
    
        User::factory(10)->create();

        Pattern::factory()->count(5)->create();

        $dreams = Dream::factory()->count(15)->create();

        
        foreach ($dreams as $currentDream) {
            $patternIds = Pattern::inRandomOrder()->take(random_int(1,3))->pluck('id');
            $currentDream -> patterns()->attach($patternIds);
        };

        


   /*      User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
         */
    }
}
