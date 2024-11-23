<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCatalogueController extends Controller
{
    public function listBook(Request $request)
    {
        // Ambil semua kategori untuk dropdown filter
        $categories = Category::all();

        // Ambil semua buku dengan filter
        $query = Book::whereNull('user_id');

        // Filter berdasarkan judul (jika diisi)
        if ($request->has('title') && $request->title != '') {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        // Filter berdasarkan kategori (jika diisi)
        if ($request->has('category_id') && $request->category_id != '') {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('categories.id', $request->category_id);
            });
        }

        // Ambil data buku berdasarkan filter
        $books = $query->paginate(10);

        // Kirim data ke view
        return view('user.home-page', [
            'title' => 'Book Catalogue',
            'books' => $books,
            'categories' => $categories,
        ]);
    }

    public function borrowBook($id)
    {
        // ambil id buku
        $book = Book::find($id);

        // ambil id user yang sedang login
        $user = Auth::user()->id;

        // cek apakah buku sudah dipinjam
        if ($book->user_id != null) {
            return redirect()->route('member.catalogue')->with('error', 'Book has been borrowed.');
        }

        // pinjam buku
        $book->user_id = Auth::user()->id;
        // masukan tanggal pinjam
        $book->borrowed_at = now();
        $book->save();

        return redirect()->route('member.catalogue')->with('success', 'Book borrowed successfully.');
    }
}
