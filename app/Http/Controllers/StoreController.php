<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        // $books = Book::get();
        $data = [
            'pageTitle' => 'এসো বই পড়ি | Book List',
            'books' => Book::latest()->filter(request(['search']))->paginate(10)
        ];

        $cart = session()->get('cart');
        if ($cart == null)
            $cart = [];

        return view('store.index')->with('books', $data['books'])->with('cart', $cart);
        // return view('store.index')->with('books', $books)->with('cart', $cart);



        // return view('books.index', $data);
    }

    public function addToCart(Request $request)
    {
        session()->put('cart', $request->post('cart'));

        return response()->json([
            'status' => 'added'
        ]);
    }
}