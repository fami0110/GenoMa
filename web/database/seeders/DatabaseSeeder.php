<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Culinary;
use App\Models\Cultures;
use App\Models\Msmes;
use App\Models\Tourism;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        Culinary::factory(20)->create();

        Cultures::factory(20)->create();

        Msmes::factory(20)->create();
        
        Tourism::factory(20)->create();
    }
}
