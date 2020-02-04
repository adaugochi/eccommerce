<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Order;
use App\Product;
use App\Status;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Stripe\Charge;

class CartController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth', ['only' => ['addCheckOut', 'getCheckOut']]);
    }

    public function addToCart(Request $request, Product $product)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);

        $totalQty = session()->get('cart') ? session()->get('cart')->totalQty : 0;
        return response()->json(
            ['status' => $product->title.' added to cart.', 'totalQty' => $totalQty],
            200
        );
    }

    public function getCart()
    {
        $counter = 1;
        if (!Session::has('cart')) {
            return redirect()->back()->with(['info' => 'You have no item in your cart']);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $quantity = $cart->totalQty;
        $amount = $cart->totalAmt;
        $products = $cart->products;

        return view('product.cart', compact('quantity', 'amount', 'products', 'counter'));

    }

    public function getCheckOut()
    {
        $user = auth()->user();
        if (!Session::has('cart')) {
            return redirect()->back()->with(['info' => 'You have no item in your cart']);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $quantity = $cart->totalQty;
        $amount = $cart->totalAmt;

        return view('product.checkout', compact('quantity', 'amount', 'products', 'user'));
    }

    public function addCheckOut(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect('/')->with(['info' => 'You have no item in your cart']);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $this->validate(request(),[
            'name' => 'required',
            'phone_number' => 'required',
            'street_number' => 'required',
            'street_name' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required'
        ]);

        Stripe::setApiKey(env("STRIPE_SECRET_KEY"));
        try {
            $charge = Charge::create([
                "amount" => $cart->totalAmt * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Charge for purchase"
            ]);

            $order = new Order();
            $order->name = $request->name;
            $order->phone_number = $request->phone_number;
            $order->street_number = $request->street_number;
            $order->street_name = $request->street_name;
            $order->city = $request->city;
            $order->state = $request->state;
            $order->country = $request->country;
            $order->status = Status::PENDING;
            $order->cart = serialize($cart);
            $order->payment_id = $charge->id;

            auth()->user()->orders()->save($order);

        } catch (\Exception $e) {
            return redirect('product/check-out')->with('error', $e->getstatus());
        }

        Session::forget('cart');
        return redirect('/home')->with(['status' => 'Payment was successfully!.']);
    }

    public function removeOneProduct(Request $request, Product $product)
    {
        if (!Session::has('cart')) {
            return redirect('/')->with(['info' => 'You have no item in your cart']);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $cart->removeOne($product->id);
        if (count($cart->products) > 0) {
            session()->forget('cart');
            return redirect('/')->with(['info' => 'You have no item in your cart']);;
        }

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function removeAllProduct(Request $request, Product $product)
    {
        if (!Session::has('cart')) {
            return redirect('/')->with(['info' => 'You have no item in your cart']);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $cart->removeAll($product->id);
        if (count($cart->products) <= 0) {
            session()->forget('cart');
            return redirect('/')->with(['info' => 'You have no item in your cart']);
        }

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function increaseOneProduct(Request $request, Product $product)
    {
        if (!Session::has('cart')) {
            return redirect('/')->with(['info' => 'You have no item in your cart']);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $cart->increaseByOne($product->id);
        $request->session()->put('cart', $cart);

        return redirect()->back();
    }


}
