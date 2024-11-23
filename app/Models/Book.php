<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description',
        'publisher',
        'foto_buku',
        'borrowed_at',
        'returned_at',
        'user_id',
    ];

    // Relasi ke User (Many-to-One)
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Relasi ke Category melalui Pivot (Many-to-Many)
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_books', 'book_id', 'category_id');
    }
}
