<?php

namespace App\Http\Controllers;

use App\Models\catagory;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;

class checkOutController extends Controller
{
    public function checkoutStore(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_number'] = $request->shipping_number;
        $data['shipping_area'] = $request->shipping_area;
        $data['shipping_adress'] = $request->shipping_adress;
        $cartTotal = Cart::total();
        return view('fontend.cashOut', compact('data', 'cartTotal'));
    }

    public function cashOrder(Request $request)
    {

        $cartTotal = Cart::total();

        if ($request->area == 'ID') {
            $total_amount = $cartTotal + 80;
        } else {
            $total_amount = $cartTotal + 140;
        }

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            // 'name' => Auth::user()->name,
            // 'email' => Auth::user()->email,
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->phone,
            'area' => $request->area,
            'adress' => $request->address,

            'payment_type' => 'Cash On Delivery',
            'payment_method' => 'Cash On Delivery',

            'currency' => 'tk',
            'amount' => $total_amount,
            'order_number' => 'ORN' . mt_rand(10000000, 99999999),
            'invoice_no' => 'EOS' . mt_rand(10000000, 99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'pending',
            'created_at' => Carbon::now(),

        ]);

        $carts = Cart::content();
        foreach ($carts as $cart) {

            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
        } // End Foreach

        Cart::destroy();

        // OrderMail($order_id);

        $notification = array(
            'message' => 'Your Order Place Successfully',
            'type' => 'success'
        );

        // Notification::send($user, new OrderComplete($request->name));
        return redirect()->route('dashboard')->with($notification);
    }
}
