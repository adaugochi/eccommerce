<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        $orders = Order::all();
        $users = User::where('is_admin', 0)->get();
        $totalProduct = count($products);
        $totalOrder = count($orders);
        $totalUser = count($users);
        return view('admin.home', compact('totalProduct', 'totalOrder', 'totalUser'));
    }

    public function getCustomer()
    {
        $counter = 1;
        $users = User::where('is_admin', 0)->get();
        return view('customer.index', compact('users', 'counter'));
    }
}
