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
        ];
        
        foreach ($data as $category) {
            Category::create($category);
        }
    }
}
