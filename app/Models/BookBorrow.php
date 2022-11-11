<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookBorrow extends Model
{
    use HasFactory;
    protected $fillable = ['cart_id', 'book_id', 'user_id', 'status', 'due_date', 'return_date'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
