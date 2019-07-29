@extends('layouts.master')

@section('title', 'Reset Password')

@section('content')

<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

        <div class="login-wrapper wd-300 wd-xs-400 pd-25 bg-white rounded shadow-base">
            <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">
                <div class="tx-center font-weight-bold">Reset Password</div>
            </div>

            <div class="form-group">
                <input id="email" type="email" placeholder="Enter Email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" autocomplete="email">

                @include('elements.error', ['fieldName' => 'email'])
            </div>

            <div class="form-group">
                <input id="password" type="password" placeholder="Enter New Password"
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

            <button type="submit" class="btn btn-info btn-block">Reset Password</button>
            <div class="mg-t-40 tx-center"><a href="{{ url('login') }}" class="tx-info">Back to Login</a></div>
        </div>
    </div>
</form>

@endsection
