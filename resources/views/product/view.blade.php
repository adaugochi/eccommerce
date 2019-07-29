@extends('layouts.master')

@section('title', 'Product')

@section('content')
        <div class="row header-box">
            <div class="col-md-12 pd-30">
                <div>
                    <h4 class="tx-gray-800 mg-b-5">Product Information</h4>
                </div>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/admin/home') }}" class="tx-success">Home</a></li>
                    <li><a href="{{ url('/product') }}" class="tx-success">Product</a></li>
                    <li class="active">{{ $product->title }}</li>
                </ol>
            </div>
        </div>

        <div class="br-pagebody mg-t-5 pd-x-30 mt-5">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-group list-item">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="tx-dark text-uppercase">Title:</label>
                                </div>
                                <div class="col-md-9">
                                    <p>{{ ucwords($product->title) }}</p>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="tx-dark text-uppercase">Description:</label>
                                </div>
                                <div class="col-md-9">
                                    <p>{{ strip_tags(ucfirst($product->description)) }}</p>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="tx-dark text-uppercase">Quantity:</label>
                                </div>
                                <div class="col-md-9">
                                    <p>{{ $product->quantity }}</p>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="tx-dark text-uppercase">Amount:</label>
                                </div>
                                <div class="col-md-9">
                                    <p>${{ $product->amount }}</p>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="tx-dark tx-uppercase">Status:</label>
                                </div>
                                <div class="col-md-9">
                                    <span class="status status-active">{{ $product->convertSlugToText() }}</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <img src="/uploads/{{$product->image}}"  class="wd-100">
                </div>
            </div>
        </div>
@endsection