@extends('layouts.master')

@section('title', 'Forget Password')

@section('content')

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

        <div class="login-wrapper wd-300 wd-xs-350 pd-25 bg-white rounded shadow-base">
            <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">
                <div class="tx-center font-weight-bold">Forget Password</div>
            </div>

            <div class="form-group">
                <input id="email" type="text" placeholder="Enter Email/ Phone Number"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" autofocus>

                @include('elements.error', ['fieldName' => 'email'])
            </div>

            <button type="submit" class="btn btn-info btn-block">Send Password Reset Link</button>

            <div class="mg-t-60 tx-center"><a href="{{ url('login') }}" class="tx-info"> Back to Login</a></div>
        </div>
    </div>

</form>
@endsection

@section('scripts')
    @include('partials.flash-messages')
@endsection