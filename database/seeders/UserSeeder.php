<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'type' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create regular client users
        User::create([
            'name' => 'Client',
            'email' => 'client@example.com',
            'password' => Hash::make('password'),
            'type' => 'client',
            'email_verified_at' => now(),
        ]);

        // Create additional test users
        $users = [
            [
                'name' => 'Ahmed Ben',
                'email' => 'ahmed@example.com',
                'password' => 'password',
                'type' => 'client',
            ],
            [
                'name' => 'Sarah Mrad',
                'email' => 'sarah@example.com',
                'password' => 'password',
                'type' => 'client',
            ],
            [
                'name' => 'Mohamed Ali',
                'email' => 'mohamed@example.com',
                'password' => 'password',
                'type' => 'client',
            ],
        ];

        foreach ($users as $userData) {
            User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make($userData['password']),
                'type' => $userData['type'],
                'email_verified_at' => now(),
            ]);
        }
    }
}