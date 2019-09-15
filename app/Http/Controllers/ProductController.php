<?php

namespace App\Http\Controllers;

use App\Product;
use App\Status;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.new');
    }

    public function store(Request $request, Product $product)
    {
        $this->validate(request(), [
            'title' => 'required',
            'image' => 'required|image',
            'description' => 'required',
            'quantity' => 'required',
            'amount' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $filename = $request->file('image')->getClientOriginalName();
            $destination = public_path() . '/uploads/';
            $request->file('image')->move($destination, $filename);
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->image = $filename;
        $product->amount = $request->amount;
        $product->quantity = $request->quantity;
        $product->status = Status::IN_STOCK;
        $product->created_by = auth()->user()->id;

        if($product->save()){
            return redirect('/product')->with(['status' => 'Product was successfully created.']);
        }else{
            return redirect('/product')->with(['error`' => 'Failed to create new product']);
        }
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function show(Product $product)
    {
        return view('product.view', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validateData =  $request->validate([
            'title' => 'required',
            'image' => 'image',
            'description' => 'required',
            'quantity' => 'required',
            'amount' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $filename = $request->file('image')->getClientOriginalName();
            $destination = public_path() . '/uploads/';
            $request->file('image')->move($destination, $filename);
            $image = ['image' => $filename];
        }

        /** @var $image */
        $product->update(array_merge(
            $validateData,
            $image ?? []
        ));

        if($product->save()){
            return redirect('/product')->with(['status' => 'Product was successfully updated.']);
        }else{
            return redirect('/product')->with(['error`' => 'Failed to update product']);
        }
    }

    public function delete(Product $product)
    {
        $image_path = public_path().'/uploads/'.$product->image;
        unlink($image_path);

        if($product->delete()){
            return redirect('/product')->with(['status' => 'Product was successfully deleted.']);
        }else{
            return redirect('/product')->with(['error`' => 'Failed to delete product']);
        }
    }
}
