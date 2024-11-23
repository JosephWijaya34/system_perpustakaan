<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
    ];

    // Relasi ke Books melalui Pivot (Many-to-Many)
    public function books()
    {
        return $this->belongsToMany(Book::class, 'categories_books', 'category_id', 'book_id');
    }
}
