<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;

class GuestController extends Controller
{
    public function index() {

        $allBooks = [
            'books' => Book::latest()->with('borrows')->paginate(12)
        ];
        // if (!empty(auth()->user()->id)) {
        //     $authId = auth()->user()->id;
        //     $allBooks['cart_count'] = Cart::where('user_id', $authId)->count();
        // }

        return view('index', $allBooks);
    }
}
