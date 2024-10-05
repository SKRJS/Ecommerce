
<?php

use App\Mail\orderMail;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;


function OrderMail($orderId)
{
    $order = Order::where('id', $orderId)->with('items')->first();
    $mailData = [
        'subject' => 'Thanks for Your Order',
        'order' => $order

    ];
    Mail::to($order->email)->send(new orderMail($mailData));
}

?>