<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['category_name' => 'Fiction'],
            ['category_name' => 'Science'],
            ['category_name' => 'Biography'],
            ['category_name' => 'History'],
            ['category_name' => 'Technology'],
            ['category_name' => 'Self-Help'],
            ['category_name' => 'Programming'],
            ['category_name' => 'Mathematics'],
            ['category_name' => 'Physics'],
            ['category_name' => 'Fantasy'],
            ['category_name' => 'Thriller'],
            ['category_name' => 'Romance'],
        ];

        foreach ($data as $category) {
            Category::create($category);
        }
    }
}
