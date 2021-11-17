@extends('layouts.admin')

@section('title', 'Product')

@section('content')
    <div class="row header-box">
        <div class="col-md-12 pd-30">
            <div class="d-flex">
                <h4 class="tx-gray-800 mg-b-5" style="font-size:  20px">Order Information</h4>
            </div>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin/home') }}" class="tx-success">Home</a></li>
                <li><a href="{{ url('/order') }}" class="tx-success">Orders</a></li>
                <li class="active">Customer Order</li>
            </ol>
        </div>
    </div>

    <div class="br-pagebody mg-t-5 pd-x-30 mt-5">
        <div class="col-lg-8 mx-auto pb-3">
            <div class="card shadow-base card-body pd-25 bd-0">
                <h6 class="card-title tx-uppercase tx-12">Product Information</h6>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-group">
                            @foreach($order->cart->products as $product)
                                <li class="list-group-item">
                                    <div class="row row-sm">
                                        <div class="col-md-4">{{ $product['title'] }}</div>
                                        <div class="col-md-2">
                                            <span class="badge badge-secondary">{{ $product['quantity'] }}</span>
                                        </div>
                                        <div class="col-md-2 tx-success">${{ $product['amount'] }}</div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div><!-- col-12 -->
                </div><!-- row -->
            </div><!-- card -->
        </div><!-- col-8 -->

        <div class="col-lg-8 mx-auto pb-3">
            <div class="card shadow-base card-body pd-25 bd-0">
                <h6 class="card-title tx-uppercase tx-12">Purchase Information</h6>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="row row-sm">
                                    <div class="col-md-4">
                                        <label class="tx-uppercase tx-dark tx-12 pr-2">Total Amount: </label>
                                        <span class="tx-success">${{ $order->cart->totalAmt }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="tx-uppercase tx-dark tx-12 pr-2">Total Quantity: </label>
                                        <span class="badge badge-secondary">{{ $order->cart->totalQty }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="tx-uppercase tx-dark tx-12 pr-2">Status: </label>
                                        <p class="status status-{{$order->status}}">{{ $order->status }}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div><!-- col-12 -->
                </div><!-- row -->
            </div><!-- card -->
        </div><!-- col-8 -->

        <div class="col-lg-8 mx-auto pb-3">
            <div class="card shadow-base card-body pd-25 bd-0">
                <h6 class="card-title tx-uppercase tx-12">Personal Information</h6>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="row row-sm">
                                    <div class="col-md-4">Customer Name:</div>
                                    <div class="col-md-6">{{ $order->name }}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row row-sm">
                                    <div class="col-md-4">Customer Phone Number:</div>
                                    <div class="col-md-6">{{ $order->phone_number }}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row row-sm">
                                    <div class="col-md-4">Customer Email: </div>
                                    <div class="col-md-6">{{ strtolower($order->user->email) }}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row row-sm">
                                    <div class="col-md-4">Customer Address: </div>
                                    <div class="col-md-6">{{ $order->getAddress() }}</div>
                                </div>
                            </li>
                        </ul>
                    </div><!-- col-12 -->
                </div><!-- row -->
            </div><!-- card -->
        </div><!-- col-8 -->
    </div>
@endsection
