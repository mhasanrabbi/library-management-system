<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addCart(Request $request, $id)
    {
        $bookId = intval($id);
        $authId = auth()->user()->id;

        $totalCount = Cart::where('user_id', $authId)->count();
        // dd($totalCount);

        if ($totalCount < 4) {
            // $exists = Cart::where('book_id', $bookId)->where('user_id', $authId)->exists();
            $exists = Cart::where(['book_id' => $bookId, 'user_id' => $authId])->exists();
            if ($exists == true) {
                return redirect('/')->with(['message' => "You can't choose same book more than once!"]);
            } else {
                $cart['book_id'] = $bookId;
                $cart['user_id'] = $authId;
                Cart::create($cart);
                return redirect('/');
            }
        } else {
            return redirect('/')->with(['message' => "You can't choose more than four books!"]);
        }
    }

    public function showCart()
    {
        $authId = auth()->user()->id;
        $allCarts = Cart::where('user_id', $authId)->pluck('book_id');
        $bookLists = Book::whereIn('id', $allCarts)->get();
        return view('carts.index', compact('bookLists'));
    }

    public function checkoutBook(Request $request)
    {
        $checkoutLists = json_decode($request->text);
        foreach ($checkoutLists as $checkoutList) {
            $checkoutId[] = $checkoutList->id;
        }
        dd($checkoutId);
    }
}