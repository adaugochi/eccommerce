@extends('layouts.master')

@section('title', 'Product')

@section('content')
        <div class="row header-box">
            <div class="col-md-12 pd-30">
                <div>
                    <h4 class="tx-gray-800 mg-b-5">Add Product</h4>
                </div>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/admin/home') }}" class="tx-success">Home</a></li>
                    <li><a href="{{ url('/product') }}" class="tx-success">Product</a></li>
                    <li class="active">new product</li>
                </ol>
            </div>
        </div>

        <div class="br-pagebody mg-t-5 pd-x-30 mt-5">
            <form method="post" action="/product" enctype="multipart/form-data">
                @csrf
                <div class="row pb-3">
                    <div class="col-md-5">
                        <label class="font-weight-bold tx-dark">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}">
                        @include('elements.error', ['fieldName' => 'title'])
                    </div>
                    <div class="col-md-5">
                        <label class="font-weight-bold tx-dark">Amount</label>
                        <div class="input-group">
                            <div class="input-group-prepend px-3">
                                <span class="input-group-text tx-24 tx-center tx-white tx-bold">$</span>
                            </div>
                            <input type="text" class="form-control @error('amount') is-invalid @enderror"
                               value="{{ old('amount') }}" name="amount">
                        </div>
                        @include('elements.error', ['fieldName' => 'amount'])
                    </div>
                </div>

                <div class="row pb-3">
                    <div class="col-md-5">
                        <label class="font-weight-bold tx-dark">Image</label>
                        <div class="input-container">
                            <input type="file" name="image"
                                   class="form-control pt-2 form-control-sm @error('image') is-invalid @enderror">
                            @include('elements.error', ['fieldName' => 'image'])
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label class="font-weight-bold tx-dark">Quantity</label>
                        <input type="number" value="{{ old('quantity') }}" name="quantity"
                               class="form-control @error('quantity') is-invalid @enderror">
                        @include('elements.error', ['fieldName' => 'quantity'])
                    </div>
                </div>

                <div class="row pb-4">
                    <div class="col-md-10">
                        <label class="font-weight-bold tx-dark">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="summary-ckeditor" name="description">
                            {{ old('description') }}
                        </textarea>
                        @include('elements.error', ['fieldName' => 'description'])
                    </div>
                </div>

                <button class="btn btn-success">
                    Save Product
                </button>
            </form>
        </div>
@endsection
