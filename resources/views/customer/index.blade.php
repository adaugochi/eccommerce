@extends('layouts.master')

@section('title', 'Product')

@section('content')
    <div class="row header-box">
        <div class="col-md-12 pd-30">
            <div class="d-flex">
                <h4 class="tx-gray-800 mg-b-5" style="font-size:  20px">Customer</h4>
            </div>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin/home') }}" class="tx-success">Home</a></li>
                <li class="active">Customers</li>
            </ol>
        </div>
    </div>

    <div class="br-pagebody mg-t-5 pd-x-30 mt-5">
        <div class="bd rounded table-responsive">
            <table class="table table-bordered table-striped mg-b-0">
                <thead>
                <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email Address</th>
                    <th>Country</th>
                    <th>No. of Purchase</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $counter++ }}</th>
                        <td>{{ ucwords($user->name) }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ strtolower($user->email) }}</td>
                        <td>{{ ucfirst($user->country)}}</td>
                        <td>{{ count($user->orders) ? count($user->orders) : 0}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
