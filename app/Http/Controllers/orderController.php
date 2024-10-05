<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{
    public function pendingOrder()
    {
        $order = Order::where('status', 'pending')->orderBy('id', 'DESC')->get();
        return view('admin.order.order', compact('order'));
    }

    public function ConfirmOrder()
    {
        $order = Order::where('status', 'confirm')->orderBy('id', 'DESC')->get();
        return view('admin.order.orderConfirm', compact('order'));
    }

    public function viewOrder($order_id)
    {
        $orders = Order::where('id', $order_id)->get();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('admin.order.adminOrder', compact('orderItem', 'orders'));
    }


    // update-order-status 

    public function updateOrder($orderId)
    {
        $product = OrderItem::where('order_id', $orderId)->get();
        foreach ($product as $item) {
            product::where('id', $item->product_id)->update(['product_qty' => DB::raw('product_qty-' . $item->qty)]);
        }
        Order::findOrFail($orderId)->update(['status' => 'confirm']);
        $notification = array(
            'message' => 'You Need to Login First',
            'alert-type' => 'error'
        );

        return redirect()->route('pendingOrder')->with($notification);
    }

    // userOrder 
    public function UserOrder()
    {
        $id = Auth::user()->id;
        $orders = Order::where('user_id', $id)->orderBy('id', 'DESC')->get();
        return view('admin.order.userOrder', compact('orders'));
    }

    public function orderUserView($order_id)
    {
        $orders = Order::where('id', $order_id)->where('user_id', Auth::id())->get();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('admin.order.userOrderView', compact('orderItem', 'orders'));
    }

    // stock Product
    public function stockProduct()
    {
        $product = product::latest()->get();
        return view('admin.stock.stock', compact('product'));
    }
}
