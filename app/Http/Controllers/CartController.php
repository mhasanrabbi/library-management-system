<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookBorrow;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addCart(Request $request, $id)
    {
        $bookId = intval($id);
        $authId = auth()->user()->id;

        $cartTable = Cart::where('user_id', $authId)->where('status', 1);

        $totalCount = $cartTable->count();
        $exists = $cartTable->where('book_id', $bookId)->exists();

        if ($totalCount < 4) {
            if ($exists == true) {
                return redirect('/')->with(['message' => "You can't choose same book more than once!"]);
            } else {
                $cart['book_id'] = $bookId;
                $cart['user_id'] = $authId;
                $cart['status'] = 1;
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
        $cartLists = Cart::where('user_id', $authId)->where('status', 1)->with('book')->get();
        // $allCarts = Cart::where('user_id', $authId)->pluck('book_id');
        // $bookLists = Book::whereIn('id', $allCarts)->get();
        return view('carts.index', ['cartLists' => $cartLists]);
    }

    public function checkoutBook()
    {
        $authId = auth()->user()->id;
        $cartLists = Cart::where('user_id', $authId)->where('status', 1)->get();

        foreach ($cartLists as $cartList) {
            $total_borrow_books = BookBorrow::where('book_id', $cartList->book_id)->where('status', 0)->count();
            $max_books = Book::find($cartList->book_id);

            if ($total_borrow_books < $max_books->total_books) {
                $borrowBook['cart_id'] = $cartList->id;
                $borrowBook['book_id'] = $cartList->book_id;
                $borrowBook['user_id'] = $cartList->user_id;
                $borrowBook['status'] = 0;
                $today = date("Y-m-d H:i:s");
                $borrowBook['due_date'] = date("Y-m-d H:i:s", strtotime("$today +7 day"));
                $borrowBook['return_date'] = null;
                BookBorrow::create($borrowBook);

                $cart['status'] = 0;
                Cart::where('id', $cartList->id)->update($cart);
            }
            $books[] = $max_books->title;
        }
        if (!empty($books)) {
            $books = implode(", ", $books);
            return redirect('/')->with(['message' => '<b>' . $books . '</b> out of stock!']);
        } else {
            return redirect('/');
        }
    }

    public function destroy($id)
    {
        Cart::where('id', $id)->delete();
        return redirect()->back()->with(['message' => 'Item has been removed successfully!']);
    }

    public function myBooks()
    {
        $authId = auth()->user()->id;
        // $myBooks = BookBorrow::whereDate('due_date', '<', today())->update[[]]
        $myBooks = BookBorrow::where('user_id', $authId)->where('status', 0)->with('book')->get();
        return view('orders.index', compact(['myBooks']));
    }
    public function  bookStatus()
    {
        $authId = auth()->user()->id;

        $myBooks = BookBorrow::where('user_id', $authId)->whereDate('due_date', '<', today())->update(['status' => '1']);
        return view('orders.index', compact(['myBooks']));
    }
}