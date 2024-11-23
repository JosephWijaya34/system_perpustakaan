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
            ['book_id' => 4, 'category_id' => 5], // Book 4 -> Technology
            ['book_id' => 5, 'category_id' => 6], // Book 5 -> Self-Help
            ['book_id' => 5, 'category_id' => 2], // Book 5 -> Science
            ['book_id' => 6, 'category_id' => 7], // Book 6 -> Programming
            ['book_id' => 6, 'category_id' => 5], // Book 6 -> Technology
            ['book_id' => 7, 'category_id' => 8], // Book 7 -> Mathematics
            ['book_id' => 8, 'category_id' => 9], // Book 8 -> Physics
            ['book_id' => 8, 'category_id' => 10], // Book 8 -> Fantasy
            ['book_id' => 2, 'category_id' => 11], // Book 2 -> Thriller
            ['book_id' => 3, 'category_id' => 12], // Book 3 -> Romance
        ];

        DB::table('categories_books')->insert($data);
    }
}
