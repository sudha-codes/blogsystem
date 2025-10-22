<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@sudha.com',
            'password' => bcrypt('Sudha@123'), // default password
            'role' => 'admin', // default password
        ]);
    }
}
