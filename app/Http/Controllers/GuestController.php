<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index() {

        $allBooks = [
            'books' => Book::latest()->paginate(12)
        ];

        return view('index', $allBooks);
    }
}
