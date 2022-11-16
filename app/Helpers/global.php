<?php

use App\Models\Cart;

function cart_count()
{
    $authId = auth()->user()->id;
    $cart_count = Cart::where('user_id', $authId)
    ->where('status', 1)->count();
    return $cart_count;
}
