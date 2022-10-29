<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'image',
        'isbn',
        'category',
        'author',
        'total_books',
        'book_source',
        'rack_no',
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')->orWhere('author', 'like', '%' . request('search') . '%')->orWhere('category', 'like', '%' . request('search') . '%')->orWhere('isbn', 'like', '%' . request('search') . '%')->orWhere('rack_no', 'like', '%' . request('search') . '%');
        }
    }
}