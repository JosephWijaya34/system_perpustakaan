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
        $data = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'phone' => '081234567890',
                'foto' => 'admin.jpg',
                'role_id' => 1, // Role Admin
            ],
            [
                'name' => 'Member User',
                'email' => 'member@example.com',
                'password' => Hash::make('password'),
                'phone' => '081234567890',
                'foto' => 'member.jpg',
                'role_id' => 2, // Role Member
            ],
        ];

        foreach ($data as $user) {
            User::create($user);
        }
    }
}
