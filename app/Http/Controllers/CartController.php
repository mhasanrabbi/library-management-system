<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = Cart::getContent();
        // dd($cartItems);
        return view( 'books.cart', compact( 'cartItems' ) );
    }

    public function addToCart( Request $request )
    {

        if ( Cart::getTotalQuantity() < 4 ) {

            Cart::add( [
                'id'         => $request->id,
                'name'       => $request->title,
                'price'      => $request->price,
                'quantity'   => $request->quantity,
                'attributes' => array(
                    'image' => $request->image,
                ),
            ] );
            session()->flash( 'success', 'Product is Added to Cart Successfully !' );
            // return redirect()->route('cart.list');
            return back();
        } else {
            session()->flash( 'error', 'You can take only four books !' );
           return back();


        }

    }

    public function updateCart( Request $request )
    {

        Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value'    => $request->quantity,
                ],
            ]
        );
        session()->flash( 'success', 'Item Cart is Updated Successfully !' );
        return redirect()->route( 'cart.list' );

    }

    public function removeCart( Request $request )
    {
        Cart::remove( $request->id );
        session()->flash( 'success', 'Item Cart Remove Successfully !' );

        return redirect()->route( 'cart.list' );
    }

    public function clearAllCart()
    {
        Cart::clear();

        session()->flash( 'success', 'All Item Cart Clear Successfully !' );

        return redirect()->route( 'cart.list' );
    }
}
