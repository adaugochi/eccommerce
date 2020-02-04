@extends('layouts.master')

@section('title', 'Product')

@section('content')
        <div class="row header-box">
            <div class="col-md-12 pd-30">
                <div class="d-flex">
                    <h4 class="tx-gray-800 mg-b-5" style="font-size:  20px">Products</h4>
                    <a class="btn btn-sm btn-outline-success ml-3" href="{{ url('/product/new') }}">
                        <span class="fa fa-plus"></span> Add new product
                    </a>
                </div>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/admin/home') }}" class="tx-success">Home</a></li>
                    <li class="active">Products</li>
                </ol>
            </div>
        </div>


        <div class="br-pagebody mg-t-5 pd-x-30 mt-5">
            <div class="bd rounded table-responsive">
                <table class="table table-bordered table-striped mg-b-0">
                    <thead>
                        <tr>
                            <th class="wd-5p">S/N </th>
                            <th class="wd-20p">Title</th>
                            <th class="wd-30p">Description</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-20p">Created At</th>
                            <th class="wd-10p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $key => $product)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ strip_tags($product->description) }}</td>
                            <td>
                                <span class="status status-{{$product->status}}">
                                    {{ $product->convertSlugToText() }}
                                </span>
                            </td>
                            <td>{{ $product->getAttributeCreatedAt() }}</td>
                            <td>
                                <a href="{{ url('/product/view/'. $product->id) }}" class="tx-dark pr-1"><i class="icon ion-eye tx-20"></i></a>
                                <a href="/product/{{ $product->id }}/edit" class="tx-dark pr-1"><i class="icon ion-edit tx-20"></i></a>
                                <a href="#" class="tx-dark" data-toggle="modal" data-target="#modalDelete_{{ $product->id }}">
                                    <i class="icon ion-trash-a tx-20"></i>
                                </a>
                            </td>
                            <!--Delete Modal -->
                            <div class="modal fade" id="modalDelete_{{ $product->id }}" role="dialog" tabindex="-1" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-md">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header bg-light">
                                            <span><h4 class="tx-dark">Delete Product</h4></span>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="/product/{{$product->id}}" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <p>Are you sure you want to delete this product ? </p>

                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-danger">
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

            {{ $products->render() }}
        </div>
@endsection

@section('scripts')
    @include('partials.flash-messages')
@endsection
