@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
    @include('elements.header')
    @if (session()->has('message'))
        <div class="row pt-2">
            <div class="col-md-3 mx-auto alert alert-success text-center animated fadeIn ">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>
                    {!! session()->get('message') !!}
                </strong>
            </div>
        </div>
    @endif
    <div class="row row-sm br-pagebody">
        @foreach($products as $product)
        <div class="col-sm-6 col-lg-3 pb-5">
            <div class="card shadow-base bd-0">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                    <h6 class="card-title tx-uppercase tx-12 mg-b-0">{{ $product->title }}</h6>
                    <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <img src="/uploads/{{ $product->image }}" class="w-25 mx-auto">
                    </div>
                    <p class="tx-11 mg-b-0 mg-t-15">Notice: {{ strip_tags($product->description) }}</p>
                </div><!-- card-body -->
                <div class="card-footer bg-transparent d-flex justify-content-between align-items-center">
                    <a href="{{ url('add-to-cart', ['id' => $product->id]) }}" class="btn btn-sm btn-success">Add to Cart</a>

                    <div>
                        <span class="tx-11">Amount</span>
                        <h6 class="tx-danger font-weight-bold">${{ $product->amount }}</h6>
                    </div>
                </div>
            </div><!-- card -->
        </div><!-- col-3 -->
        @endforeach
    </div><!-- row -->


@include('elements.footer')

@endsection