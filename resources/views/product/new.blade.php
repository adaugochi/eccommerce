@extends('layouts.admin')

@section('title', 'Product')

@section('content')
        <div class="row header-box">
            <div class="col-md-12 pd-30">
                <div>
                    <h4 class="tx-gray-800 mg-b-5">New Product</h4>
                </div>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/admin/home') }}" class="tx-success">Home</a></li>
                    <li><a href="{{ url('/product') }}" class="tx-success">Product</a></li>
                    <li class="active">new product</li>
                </ol>
            </div>
        </div>

        <div class="br-pagebody mg-t-5 pd-x-30 mt-5">
            <form method="post" action="{{ url('/product') }}" enctype="multipart/form-data">
                @csrf
                @include('partials.product-form', ['isEdit' => false])
            </form>
        </div>
@endsection
