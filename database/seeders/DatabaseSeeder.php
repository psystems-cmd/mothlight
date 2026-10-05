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
            'email' => 'mia@mothligh.test',
            'password' => 'Password3000',
            //'is_admin' => true
        ]);
    
        User::factory(10)->create();

        Pattern::factory()->count(5)->create();

        $dreams = Dream::factory()->count(15)->create();

   /*      User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
         */
    }
}
