@extends('layouts.master')

@section('title', 'Welcome')

@section('content')

    <div class="br-pagebody">
        <div class="row">
            @foreach($orders as $order)
            <div class="col-lg-8 mx-auto pb-3">
                <div class="card shadow-base card-body pd-25 bd-0">
                    <h6 class="card-title tx-uppercase tx-12">My Orders</h6>
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
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    @include('partials.flash-messages')
@endsection
