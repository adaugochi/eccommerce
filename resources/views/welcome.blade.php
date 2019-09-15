@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
    @include('elements.header')
    <div class="flash-message"></div>
    <div class="row row-sm br-pagebody">
        @foreach($products as $product)
            <input hidden value="{{ $product->id }}" id="productId{{ $product->id }}">
        <div class="col-sm-6 col-lg-3 pb-5">
            <div class="card shadow-base bd-0">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                    <h6 class="card-title tx-uppercase tx-12 mg-b-0">{{ $product->title }}</h6>
                    <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <img src="/uploads/{{ $product->image }}" class="w-25 mx-auto">
                    </div>
                    <p class="tx-11 mg-b-0 mg-t-15">Notice: {{ strip_tags($product->description) }}</p>
                </div><!-- card-body -->
                <div class="card-footer bg-transparent d-flex justify-content-between align-items-center">
                    <button id="addCart{{ $product->id }}" class="btn btn-sm btn-success">Add to Cart</button>

                    <div>
                        <span class="tx-11">Amount</span>
                        <h6 class="tx-danger font-weight-bold">${{ $product->amount }}</h6>
                    </div>
                </div>
            </div><!-- card -->
        </div><!-- col-3 -->
        @endforeach
    </div><!-- row -->

@include('elements.footer')

@endsection

@section('scripts')

<script>
    $(document).ready(function () {
        <?php foreach ($products as $product) {?>
            $('#addCart{{$product->id}}').click(function () {
                let product_id = $('#productId{{$product->id}}').val();

                $.ajax({
                    url: '/add-to-cart/'+product_id,
                    type: 'get',
                    data: {product_id: product_id},
                    success: function (data) {
                        toastr.success(data['status']);
                        $('#cart').html(data['totalQty']);
                    }
                });
            });

        <?php } ?>
    });
</script>

@include('partials.flash-messages')

@endsection