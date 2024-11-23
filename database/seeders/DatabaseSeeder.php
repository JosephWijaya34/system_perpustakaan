<?php

namespace Database\Seeders;

use App\Models\Book;
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
        // ambil semua seeder
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            BookSeeder::class,
            CategorySeeder::class,
            CategoryBookSeeder::class,
        ]);
    }
}