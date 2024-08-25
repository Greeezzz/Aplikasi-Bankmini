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
        User::create([
            'ktp' => '1234567890123456',
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'hp' => '083867577655',
            'password' => bcrypt('admin1234'),
            'peran' => 'admin',
        ]);
        
    }
}
