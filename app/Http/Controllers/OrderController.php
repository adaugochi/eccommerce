<?php

namespace App\Http\Controllers;

use App\Order;
use App\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $counter = 1;
        $orders = Order::all();
        $orders->transform(function ($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('orders.index', compact('orders', 'counter'));
    }

    public function view(Order $order)
    {
        $order->cart = unserialize($order->cart);
        return view('orders.view', compact('order'));
    }

    public function deliver(Order $order)
    {
        $order->status = Status::DELIVERED;

        $order->update();
        return redirect()->back()->with('message', 'Order has been delivered successfully!!!');
    }
}
