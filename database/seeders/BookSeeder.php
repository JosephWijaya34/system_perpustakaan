<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                'title' => 'Laravel for Beginners',
                'author' => 'Taylor Otwell',
                'description' => 'An introductory book for Laravel framework.',
                'publisher' => 'Laravel Publishing',
                'foto_buku' => 'laravel_for_beginners.jpg',
                'borrowed_at' => null,
                'returned_at' => null,
                'user_id' => null,
            ],
            [
                'title' => 'Mastering PHP',
                'author' => 'John Doe',
                'description' => 'A comprehensive guide to mastering PHP programming.',
                'publisher' => 'PHP Experts Publishing',
                'foto_buku' => 'mastering_php.jpg',
                'borrowed_at' => now(),
                'returned_at' => null,
                'user_id' => 2,
            ],
            [
                'title' => 'Database Design Fundamentals',
                'author' => 'Jane Smith',
                'description' => 'Learn the basics of database design and normalization.',
                'publisher' => 'TechPress',
                'foto_buku' => 'database_design.jpg',
                'borrowed_at' => null,
                'returned_at' => '2024-01-10 15:00:00',
                'user_id' => 2,
            ],
            [
                'title' => 'Advanced Laravel Techniques',
                'author' => 'Taylor Otwell',
                'description' => 'A deep dive into Laravel framework for advanced developers.',
                'publisher' => 'Laravel Publishing',
                'foto_buku' => 'advanced_laravel.jpg',
                'borrowed_at' => null,
                'returned_at' => null,
                'user_id' => null,
            ],
            [
                'title' => 'Introduction to Machine Learning',
                'author' => 'Andrew Ng',
                'description' => 'A beginner-friendly book to understand the basics of machine learning.',
                'publisher' => 'AI Press',
                'foto_buku' => 'machine_learning.jpg',
                'borrowed_at' => now(),
                'returned_at' => null,
                'user_id' => 2,
            ],
            [
                'title' => 'Python for Data Science',
                'author' => 'Jake VanderPlas',
                'description' => 'A guide to using Python for data analysis and visualization.',
                'publisher' => 'O\'Reilly Media',
                'foto_buku' => 'python_data_science.jpg',
                'borrowed_at' => null,
                'returned_at' => '2024-02-15 14:00:00',
                'user_id' => 2,
            ],
            [
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'description' => 'A guide to writing clean, maintainable code.',
                'publisher' => 'Prentice Hall',
                'foto_buku' => 'clean_code.jpg',
                'borrowed_at' => null,
                'returned_at' => null,
                'user_id' => null,
            ],
            [
                'title' => 'The Pragmatic Programmer',
                'author' => 'Andrew Hunt and David Thomas',
                'description' => 'Tips and best practices for software development.',
                'publisher' => 'Addison-Wesley',
                'foto_buku' => 'pragmatic_programmer.jpg',
                'borrowed_at' => now(),
                'returned_at' => null,
                'user_id' => 2,
            ],
        ];

        foreach ($data as $book) {
            Book::create($book);
        }
    }
}
