<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Destination;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create(
            [
                'name'     => 'Admin',
                'email'    => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'roles'    => 'administrator',
            ]
        );

        User::create(
            [
                'name'     => 'Nata',
                'email'    => 'nata@gmail.com',
                'password' => bcrypt('nata123'),
                'roles'    => 'user',
            ],
        );

        User::create(
            [
                'name'     => 'Keysha Athallia',
                'email'    => 'keysha@gmail.com',
                'password' => bcrypt('keysha'),
                'roles'    => 'user',
            ],
        );
        
    }
}
