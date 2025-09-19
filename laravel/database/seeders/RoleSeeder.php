<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create([
            'role_id' => Str::uuid(),
            'role_code' => 'ADMIN',
            'role_name' => 'Administrator',
        ]);

        Role::create([
            'role_id' => Str::uuid(),
            'role_code' => 'MODERATOR',
            'role_name' => 'Moderator',
        ]);

        Role::create([
            'role_id' => Str::uuid(),
            'role_code' => 'USER',
            'role_name' => 'User',
        ]);
    }
}
