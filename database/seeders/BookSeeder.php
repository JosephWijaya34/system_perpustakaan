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
                'borrowed_at' => null, // Belum dipinjam
                'returned_at' => null,
                'user_id' => null, // Tidak ada user yang meminjam
            ],
            [
                'title' => 'Mastering PHP',
                'author' => 'John Doe',
                'description' => 'A comprehensive guide to mastering PHP programming.',
                'publisher' => 'PHP Experts Publishing',
                'foto_buku' => 'mastering_php.jpg',
                'borrowed_at' => now(), // Dipinjam hari ini
                'returned_at' => null, // Belum dikembalikan
                'user_id' => 1, // Dipinjam oleh User dengan ID 1
            ],
            [
                'title' => 'Database Design Fundamentals',
                'author' => 'Jane Smith',
                'description' => 'Learn the basics of database design and normalization.',
                'publisher' => 'TechPress',
                'foto_buku' => 'database_design.jpg',
                'borrowed_at' => '2024-01-01 10:00:00', // Contoh tanggal peminjaman
                'returned_at' => '2024-01-10 15:00:00', // Contoh tanggal pengembalian
                'user_id' => 2, // Dipinjam oleh User dengan ID 2
            ],
        ];

        foreach ($data as $book) {
            Book::create($book);
        }
    }
}
