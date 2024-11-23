<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['book_id' => 1, 'category_id' => 1], // Book 1 -> Fiction
            ['book_id' => 1, 'category_id' => 2], // Book 1 -> Science
            ['book_id' => 2, 'category_id' => 3], // Book 2 -> Biography
            ['book_id' => 3, 'category_id' => 4], // Book 3 -> History
        ];

        DB::table('categories_books')->insert($data);
    }
}
