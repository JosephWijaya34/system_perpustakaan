<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Book List';
        $books = Book::with('user')->paginate(5);

        return view('admin.books.book-dashboard', compact('title', 'books'));
    }

    public function confirmReturn(string $id)
    {
        $book = Book::findOrFail($id);

        // Pastikan buku sudah ditandai untuk pengembalian
        if (is_null($book->returned_at)) {
            return redirect()->route('books.index')->with('error', 'Buku belum ditandai untuk pengembalian.');
        }

        // Proses konfirmasi pengembalian
        $book->update([
            'user_id' => null,        // Lepas user_id
            'returned_at' => null,    // Reset returned_at
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('books.index')->with('success', 'Pengembalian buku berhasil dikonfirmasi.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Book';

        // cek apakah ada category
        if (Category::all()->count() == 0) {
            return redirect()->route('categories.index')
                ->with('info', 'Please create a category first.');
        }

        // ambil semua data category
        $categories = Category::all();

        return view('admin.books.book-create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi inputan
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'publisher' => 'required|string|max:255',
            'foto_buku' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'category_id' => 'required|array',
            'category_id.*' => 'exists:categories,id',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Upload foto (jika ada)
        $fotoPath = null;
        if ($request->hasFile('foto_buku')) {
            $extension = $request->file('foto_buku')->getClientOriginalExtension();
            $newName = 'foto_buku-' . now()->timestamp . '.' . $extension;
            $fotoPath = $request->file('foto_buku')->storeAs('foto_buku_photos', $newName, 'public');
        }

        // Simpan data buku ke database
        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'publisher' => $request->publisher,
            'foto_buku' => $fotoPath,
        ]);

        // Hubungkan kategori ke buku
        $book->categories()->attach($request->category_id);

        return redirect()->route('books.index')
            ->with('success', 'Book created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Edit Book';
        $book = Book::with('categories')->findOrFail($id);
        $categories = Category::all();

        // Ambil id kategori yang sudah terhubung dengan buku
        $selectedCategories = $book->categories->pluck('id')->toArray();

        return view('admin.books.book-edit', compact('title', 'book', 'categories', 'selectedCategories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'string|max:255',
            'author' => 'string|max:255',
            'description' => 'string',
            'publisher' => 'string|max:255',
            'foto_buku' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|array',
            'category_id.*' => 'exists:categories,id',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Ambil data buku
        $book = Book::findOrFail($id);

        // Cek dan update foto jika ada foto baru yang diunggah
        if ($request->hasFile('foto_buku')) {
            // Hapus foto lama jika ada
            if ($book->foto_buku && Storage::disk('public')->exists($book->foto_buku)) {
                Storage::disk('public')->delete($book->foto_buku);
            }

            // Simpan foto baru
            $fotoPath = $request->file('foto_buku')->store('foto_buku_photos', 'public');
            $book->foto_buku = $fotoPath;
        }

        // Update data buku
        $book->update([
            'title' => $request->title ?? $book->title,
            'author' => $request->author ?? $book->author,
            'description' => $request->description ?? $book->description,
            'publisher' => $request->publisher ?? $book->publisher,
        ]);

        // Sinkronisasi kategori di pivot table
        $book->categories()->sync($request->category_id);

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);

        // Hapus hubungan kategori di pivot table
        $book->categories()->detach();

        // Hapus foto dari storage jika ada
        if ($book->foto_buku && Storage::disk('public')->exists($book->foto_buku)) {
            Storage::disk('public')->delete($book->foto_buku);
        }

        // Hapus buku dari database
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }
}
