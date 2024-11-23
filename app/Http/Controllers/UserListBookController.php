<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserListBookController extends Controller
{
    public function borrowedBooks()
    {
        $title = 'Borrowed Books';
        $user = Auth::user()->id;
        $books = Book::where('user_id', $user)->paginate(5);
        
        return view('user.list-book', compact('title', 'books'));
    }

    public function returnBook(string $id)
    {
        // Ambil data buku yang akan dikembalikan
        $book = Book::find($id);

        // Pastikan buku dipinjam oleh pengguna login
        if ($book->user_id !== Auth::id()) {
            return redirect()->route('borrowed.books')->with('error', 'Anda tidak memiliki izin untuk mengembalikan buku ini.');
        }

        // Proses pengembalian oleh member
        $book->update([
            'borrowed_at' => null,       // Menghapus tanggal peminjaman
            'returned_at' => now(),      // Mengisi tanggal pengembalian
        ]);

        return redirect()->route('borrowed.books')->with('success', 'Buku berhasil ditandai untuk dikembalikan. Menunggu konfirmasi admin.');
    }
}
