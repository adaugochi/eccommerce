@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
    <div class="row row-sm br-pagebody">
        <div class="col-lg-6 col-md-12 mx-auto">
            <div class="card shadow-base ">
                <div class="card-header bg-transparent pd-20">
                    <h6 class="card-title tx-uppercase tx-center tx-12 mg-b-0">List of Item in Cart</h6>
                </div><!-- card-header -->
                <table class="table table-striped tx-12">
                    <thead>
                    <?php $fields = ['S/N', 'Title', 'Quantity', 'Amount', 'Action']; ?>
                    <tr class="tx-10">
                        @foreach($fields as $field)
                            <th class="">{{ $field }}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $key => $product)
                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td>{{ $product['title'] }}</td>
                            <td><span class="mr-5">{{ $product['quantity'] }}</span></td>
                            <td class="tx-success">${{ $product['amount'] }}</td>
                            <td class="cart-action">
                                <a href="#" class="status status-delete" data-toggle="modal"
                                   data-target="#modalOne_{{ $product['product']['id'] }}">
                                    <span class="icon ion-minus tx-15"></span> One
                                </a>
                                <a href="#" class="status status-delete" data-toggle="modal"
                                   data-target="#modalAll_{{ $product['product']['id'] }}">
                                    <span class="icon ion-minus tx-15"></span> All
                                </a>
                                <a href="#" class="status status-active" data-toggle="modal"
                                   data-target="#modalInc_{{ $product['product']['id'] }}">
                                    <span class="icon ion-plus-round tx-15"></span> One
                                </a>
                            </td>
                            <!--Delete One Modal -->
                            <div class="modal fade" id="modalOne_{{ $product['product']['id'] }}" role="dialog" tabindex="-1" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-md">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header bg-light">
                                            <span><h4 class="tx-dark">Remove One Product</h4></span>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to remove one product? </p>

                                            <div class="text-right">
                                                <a href="/remove-one/{{ $product['product']['id'] }}" class="btn btn-warning">
                                                    Yes
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Delete All Modal -->
                            <div class="modal fade" id="modalAll_{{ $product['product']['id'] }}" role="dialog"
                                 tabindex="-1" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-md">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header bg-light">
                                            <span><h4 class="tx-dark">Remove All Product</h4></span>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to remove all products? </p>
                                            <div class="text-right">
                                                <a href="/remove-all/{{ $product['product']['id'] }}" class="btn btn-warning">
                                                    Yes
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Increase By One Modal -->
                            <div class="modal fade" id="modalInc_{{ $product['product']['id'] }}" role="dialog"
                                 tabindex="-1" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-md">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header bg-light">
                                            <span><h4 class="tx-dark">Increase Product Quantity</h4></span>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to increase the product quantity? </p>

                                            <div class="text-right">
                                                <a href="/increase-one/{{ $product['product']['id'] }}" class="btn btn-warning">
                                                    Yes
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- card -->
            <div class="row py-4">
                <div class="col-md-6">
                    <label class="tx-bold pr-2">Total Quantity:</label>
                    <span> {{ $quantity }}</span>
                </div>
                <div class="col-md-6">
                    <label class="tx-bold pr-2">Total Amount:</label>
                    <span class="tx-success"> ${{ $amount }}</span>
                </div>
            </div>
            <a href="{{ url('/product/check-out') }}" class="btn btn-success float-right">Checkout</a>
        </div><!-- col-6 -->
    </div><!-- row -->

@endsection
