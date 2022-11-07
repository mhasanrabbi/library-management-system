<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart');
        if ($cart == null)
            $cart = [];

        return view('books.cart')->with('cart', $cart);
    }

    public function payWithPaypal()
    {
        $cart = session()->get('cart');

        $totalAmount = 0;

        foreach ($cart as $item) {
            $totalAmount += $item['price'] * $item['qty'];
        }

        $order = new Order();
        $userid_rendom = rand(1, 6);
        $order->user_id = (Auth::user()->id) ?? $userid_rendom;
        $order->amount = $totalAmount;
        $order->save();

        $data = [];

        foreach ($cart as $item) {
            $data['items'] = [
                [
                    'title' => $item['title'],
                    'price' => $item['price'],
                    'desc'  => $item['title'],
                    'qty' => $item['qty'],
                ]
            ];

            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->book_id = $item['id'];
            $orderItem->quantity = $item['qty'];
            $orderItem->amount = $item['price'];
            $orderItem->save();
        }

        // dd($order, $orderItem, session());
        // $data['invoice_id'] = $order->id;
        // $data['invoice_description'] = "Your Order #{$order->id}";
        // $data['return_url'] = route('paypal-success');
        // $data['cancel_url'] = route('paypal-cancel');
        // $data['total'] = $totalAmount;

        // $provider = new ExpressCheckout;

        // $response = $provider->setExpressCheckout($data);

        // $response = $provider->setExpressCheckout($data, true);

        // return redirect($response['paypal_link']);
        // session(['cart' => []]);
        Session::forget('cart');
        return redirect('/books')->with("success", "data is going to save");
    }



    public function addToCart(Request $request)
    {
        session()->put('cart', $request->post('cart'));

        return response()->json([
            'status' => 'added'
        ]);
    }

    public function paypalSuccess()
    {
        return 'Payment success!';
    }

    public function paypalCancel()
    {
        return 'Payment canceled!';
    }
}