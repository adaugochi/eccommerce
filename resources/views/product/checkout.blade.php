@extends('layouts.master')

@section('title', 'Welcome')

@section('content')

    <div class="br-pagebody">
        <div class="row">
            <div class="col-md-6 mx-auto shadow-base pt-2">
                <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">
                    <div class="tx-center font-weight-bold">Check Out</div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="tx-bold pr-2">Total Quantity Items To Purchase:</label>
                        <span> {{ $quantity }}</span>
                    </div>
                    <div class="col-md-6">
                        <label class="tx-bold pr-2">Total Amount Of Items:</label>
                        <span class="tx-success"> ${{ $amount }}</span>
                    </div>
                </div>
                <hr>
                @if(session()->has('error'))
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div id="error" class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <form method="post" action="{{ url('/product/charge') }}" id="payment-form">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name:</label>
                                <input id="name" type="text" name="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       value="{{ $user->name }}" autocomplete="name">

                                @include('elements.error', ['fieldName' => 'name'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number:</label>
                                <input id="phone_number" type="text" name="phone_number" required
                                       class="form-control @error('phone_number') is-invalid @enderror"
                                       value="{{ $user->phone_number }}" autocomplete="phone_number">

                                @include('elements.error', ['fieldName' => 'phone_number'])
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Street Number:</label>
                                <input id="street_number" type="text" name="street_number" required
                                       class="form-control @error('street_number') is-invalid @enderror"
                                       value="{{ old('street_number') }}" autocomplete="street_number" autofocus>

                                @include('elements.error', ['fieldName' => 'street_number'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Street Name:</label>
                                <input id="street_name" type="text" name="street_name" required
                                       class="form-control @error('street_name') is-invalid @enderror"
                                       value="{{ old('street_name') }}" autocomplete="street_name" autofocus>

                                @include('elements.error', ['fieldName' => 'street_name'])
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>City of Residence:</label>
                                <input id="city" type="text" name="city" required
                                       class="form-control @error('city') is-invalid @enderror"
                                       value="{{ old('city') }}" autocomplete="city" autofocus>

                                @include('elements.error', ['fieldName' => 'city'])
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>State of Residence:</label>
                                <input id="state" type="text" name="state" required
                                       class="form-control @error('state') is-invalid @enderror"
                                       value="{{ old('state') }}" autocomplete="state" autofocus>

                                @include('elements.error', ['fieldName' => 'state'])
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Country of Residence:</label>
                                <input id="country" type="text" name="country" required
                                       class="form-control @error('country') is-invalid @enderror"
                                       value="{{ old('country') }}" autocomplete="country" autofocus>

                                @include('elements.error', ['fieldName' => 'country'])
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="card-element">
                            Enter Your Credit Card Information:
                        </label>
                        <div class="card py-2">
                            <div id="card-element">

                            </div>
                        </div>
                    </div>
                    <div id="card-errors" role="alert" class="tx-danger"></div>
                    <button type="submit" class="btn btn-success btn-block mb-5 mt-4" id="buy-now">Buy Now</button>
                </form>
            </div>
        </div>
    </div><!-- row -->
@include('elements.footer')
@endsection
