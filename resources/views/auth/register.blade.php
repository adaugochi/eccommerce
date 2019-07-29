@extends('layouts.master')

@section('title', 'Register')

@section('content')

<form method="POST" action="{{ route('register') }}" data-parsley-validate>
    @csrf
    <div class="d-flex align-items-center justify-content-center bg-light ht-100v">

        <div class="login-wrapper wd-300 wd-xs-400 pd-25 bg-white rounded shadow-base">
            <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">
                <div class="tx-center font-weight-bold">Register</div>
            </div>

            <div class="form-group">
                <input id="name" type="text" placeholder="Enter Full Name"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                @include('elements.error', ['fieldName' => 'name'])
            </div>

            <div class="form-group">
                <input id="email" type="email" placeholder="Enter Email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" autocomplete="email">

                @include('elements.error', ['fieldName' => 'email'])
            </div>

            <div class="form-group">
                <input id="phonenumber" type="text" placeholder="Enter Phone Number"
                       class="form-control @error('phone_number') is-invalid @enderror"
                       name="phone_number" value="{{ old('phone_number') }}" autocomplete="phone_number">

                @include('elements.error', ['fieldName' => 'phone_number'])
            </div>
            <div class="form-group">
                <input id="country" type="text" placeholder="Enter Country"
                       class="form-control @error('country') is-invalid @enderror"
                       name="country" value="{{ old('country') }}" autocomplete="country">

                @include('elements.error', ['fieldName' => 'country'])
            </div>
            <div class="form-group">
                <input id="password" type="password" placeholder="Enter Password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" autocomplete="new-password">

                @include('elements.error', ['fieldName' => 'password'])
            </div>

            <div class="form-group">
                <input id="password-confirm" type="password"
                       placeholder="Confirm Password"
                       class="form-control" name="password_confirmation"
                       autocomplete="new-password">
            </div>

            <button type="submit" class="btn btn-success btn-block">Register</button>
            <div class="mg-t-40 tx-center">Already a member? <a href="{{ url('login') }}" class="tx-success">Login</a></div>
        </div>
    </div>
</form>

@endsection
