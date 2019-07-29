@extends('layouts.master')

@section('title', 'Login')

@section('content')

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="d-flex align-items-center justify-content-center bg-light ht-100v">

        <div class="login-wrapper wd-300 wd-xs-350 pd-25 bg-white rounded shadow-base">
            <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">
                <div class="tx-center font-weight-bold">Login</div>
            </div>

            @if (session()->has('message'))
                <div class="alert alert-success text-center animated fadeIn">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>
                        {!! session()->get('message') !!}
                    </strong>
                </div>
            @endif

            <div class="form-group">
                <input id="email" type="text" placeholder="Enter Email/ Phone Number"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" autofocus>

                @include('elements.error', ['fieldName' => 'email'])
            </div>
            <div class="form-group">
                <input id="password" type="password" placeholder="Enter Password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" required autocomplete="off">
                @if (Route::has('password.request'))
                    <a class="tx-success tx-12 d-block mg-t-10" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif

                @include('elements.error', ['fieldName' => 'password'])
            </div>
            <button type="submit" class="btn btn-success btn-block">Login</button>

            <div class="mg-t-60 tx-center">Not yet a member? <a href="{{ url('register') }}" class="tx-success">Register</a></div>
        </div>
    </div>
</form>
@endsection