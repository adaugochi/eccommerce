@extends('layouts.master')

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
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-padding">
                            <div class="card__header clearfix">
                                <span class="card__title">Product Information</span>
                            </div>
                            <div class="card__body">
                                <div class="row pb-3">
                                    <div class="col-md-6">
                                        <label class="font-weight-bold tx-dark">Title</label>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                               value="{{ old('title') }}">
                                        @include('elements.error', ['fieldName' => 'title'])
                                    </div>
                                    <div class="col-md-6">
                                        <label class="font-weight-bold tx-dark">Currency</label>
                                        <select class="form-control tx-12 text_field @error('currency') is-invalid @enderror"
                                                data-placeholder="Please choose one" name="currency">
                                            <option label="Please choose one"></option>
                                            @foreach($currencies as $currency)
                                                <option value="{{ $currency->symbol }}">{{ $currency->name }}</option>
                                            @endforeach
                                        </select>
                                        @include('elements.error', ['fieldName' => 'currency'])
                                    </div>
                                </div>

                                <div class="row pb-3">
                                    <div class="col-md-6">
                                        <label class="font-weight-bold tx-dark">Amount</label>
                                        <input type="text" name="title" class="form-control @error('amount') is-invalid @enderror"
                                               value="{{ old('amount') }}">
                                        @include('elements.error', ['fieldName' => 'amount'])
                                    </div>
                                    <div class="col-md-6">
                                        <label class="font-weight-bold tx-dark">Quantity</label>
                                        <input type="number" value="{{ old('quantity') }}" name="quantity"
                                               class="form-control @error('quantity') is-invalid @enderror">
                                        @include('elements.error', ['fieldName' => 'quantity'])
                                    </div>
                                </div>

                                <div class="row pb-4">
                                    <div class="col-12">
                                        <label class="font-weight-bold tx-dark">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror"
                                                  rows="5" name="description">
                                            {{ old('description') }}
                                        </textarea>
                                        @include('elements.error', ['fieldName' => 'description'])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        @include('partials.image-upload')
                    </div>
                </div>

                <button class="btn btn-success mt-4">
                    Save Product
                </button>
            </form>
        </div>
@endsection
