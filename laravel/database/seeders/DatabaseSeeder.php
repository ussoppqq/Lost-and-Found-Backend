<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
<<<<<<< HEAD
            'name' => 'Julio',
            'email' => 'lostandfound@admin.com',
=======
            'name' => 'User',
            'email' => 'test@example.com',
>>>>>>> 6ce4e1336b4dc9b994890d2f160d11a87b53b937
        ]);
    }
}
