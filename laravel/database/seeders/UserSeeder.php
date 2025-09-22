<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Company;
use App\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $company = Company::first(); // ambil company pertama
        $adminRole = Role::where('role_code', 'ADMIN')->first();

        User::create([
            'user_id' => Str::uuid(),
            'company_id' => $company->company_id,
            'role_id' => $adminRole->role_id,
            'full_name' => 'Admin Example',
            'email' => 'admin@example.com',
            'phone_number' => '081234567890',
            'password' => bcrypt('admin123'), 
        ]);
    }
}
