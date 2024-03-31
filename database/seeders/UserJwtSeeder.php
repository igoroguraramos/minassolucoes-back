<?php

namespace Database\Seeders;

use App\Models\UserJwt;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserJwtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserJwt::create([
            'name' => 'Igor Ogura Ramos',
            'email' => 'igor@minassolucoes.com.br',
            'password' => bcrypt('12345678'),
        ]);
    }
}
