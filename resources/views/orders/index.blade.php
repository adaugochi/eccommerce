@extends('layouts.admin')

@section('title', 'Product')

@section('content')
    <div class="row header-box">
        <div class="col-md-12 pd-30">
            <div class="d-flex">
                <h4 class="tx-gray-800 mg-b-5" style="font-size:  20px">Orders</h4>
            </div>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin/home') }}" class="tx-success">Home</a></li>
                <li class="active">Orders</li>
            </ol>
        </div>
    </div>

    <div class="br-pagebody mg-t-5 pd-x-30 mt-5">
        <div class="bd rounded table-responsive">
            <table class="table table-bordered mg-b-0">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Products And Quantities</th>
                        <th>Status</th>
                        <th>Total Amount</th>
                        <th>Total Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <th scope="row">{{ $counter++ }}</th>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone_number }}</td>
                        <td>{{ ucwords($order->getAddress()) }}</td>
                        <td>
                            @foreach($order->cart->products as $product)
                            <span>
                                {{ ucwords($product['title']) }},
                            </span>
                            @endforeach
                        </td>
                        <td><span class="status status-{{$order->status}}"> {{ $order->status }} </span></td>
                        <td class="tx-success">${{ $order->cart->totalAmt }}</td>
                        <td>{{ $order->cart->totalQty }}</td>
                        <td>
                            <a href="/order/{{ $order->id }}/view" class="tx-dark pr-1"><i class="icon ion-eye tx-20"></i></a>
                            <a href="#" class="tx-dark pr-1" data-toggle="modal" data-target="#modalDeliver_{{ $order->id }}">
                                <i class="icon ion-paper-airplane tx-20"></i>
                            </a>
                        </td>
                        <!--Deliver Modal -->
                        <div class="modal fade" id="modalDeliver_{{ $order->id }}" role="dialog" tabindex="-1" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-md">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header bg-light">
                                        <span><h4 class="tx-dark">Deliver Product</h4></span>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="/order/{{$order->id}}" enctype="multipart/form-data">
                                            @csrf
                                            <p>Are you sure you want to mark this product as delivered? </p>

                                            <div class="text-right">
                                                <button type="submit" class="btn btn-success">
                                                    Yes
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    @include('partials.flash-messages')
@endsection
