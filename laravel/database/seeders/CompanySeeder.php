<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        Company::create([
            'company_id' => Str::uuid(),
            'company_name' => 'Example Company',
            'company_address' => 'Jl. Contoh No.123',
        ]);

        Company::create([
            'company_id' => Str::uuid(),
            'company_name' => 'Tech Corp',
            'company_address' => 'Jl. Teknologi No.45',
        ]);
    }
}
