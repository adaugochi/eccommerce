@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
        <div class="pd-30 header-box">
            <h4 class="tx-gray-800 mg-b-5">Dashboard</h4>
        </div>

        <div class="br-pagebody mg-t-5 pd-x-30 mt-5">
            <div class="row row-sm">
                <div class="col-sm-3 col-xl-3 col-md-6">
                    <div class="bg-success rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <i class="ion ion-android-contacts  tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Customers</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{ $totalUser }}</p>
                                <span class="tx-11 tx-roboto tx-white-6">Small</span>
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->

                <div class="col-sm-3 col-xl-3 col-md-6 mg-t-20 mg-xl-t-0">
                    <div class="bg-br-primary rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <i class="ion ion-bag tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Orders</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{ $totalOrder }}</p>
                                <span class="tx-11 tx-roboto tx-white-6">Moderate</span>
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->

                <div class="col-sm-3 col-xl-3 col-md-6 mg-t-20 mg-xl-t-0">
                    <div class="bg-success rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <i class="ion ion-ios-book-outline tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">products</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{ $totalProduct }}</p>
                                <span class="tx-11 tx-roboto tx-white-6">Small</span>
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->
            </div>


            <div class="row row-sm mg-t-20">
                <div class="col-lg-6 col-md-12">
                    <div class="card shadow-base bd-0">
                        <div class="card-header bg-transparent pd-20">
                            <h6 class="card-title tx-uppercase tx-12 mg-b-0">List of Major Customers</h6>
                        </div><!-- card-header -->
                        <table class="table table-responsive mg-b-0 tx-12">
                            <thead>
                            <tr class="tx-10">
                                <th class="wd-10p pd-y-5">&nbsp;</th>
                                <th class="pd-y-5">Name</th>
                                <th class="pd-y-5">Total amount of Purchase</th>
                                <th class="pd-y-5">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="pd-l-20">
                                    <img src="{{ asset('img/avatar.png') }}" class="wd-32 rounded-circle" id="profile-image">                                </td>
                                <td>
                                    <a href="" class="tx-inverse tx-14 tx-medium d-block">Mark K. Peters</a>
                                    <span class="tx-11 d-block">Year 4</span>
                                </td>
                                <td class="tx-12">
                                    <span class="square-8 bg-success mg-r-5 rounded-circle"></span> LSC1304123
                                </td>
                                <td>Just Now</td>
                            </tr>
                            <tr>
                                <td class="pd-l-20">
                                    <img src="{{ asset('img/avatar.png') }}" class="wd-32 rounded-circle" id="profile-image">                                </td>
                                <td>
                                    <a href="" class="tx-inverse tx-14 tx-medium d-block">Karmen F. Brown</a>
                                    <span class="tx-11 d-block">Year 6</span>
                                </td>
                                <td class="tx-12">
                                    <span class="square-8 bg-warning mg-r-5 rounded-circle"></span> LSC1104523
                                </td>
                                <td>Apr 21, 2017 8:34am</td>
                            </tr>
                            <tr>
                                <td class="pd-l-20">
                                    <img src="{{ asset('img/avatar.png') }}" class="wd-32 rounded-circle" id="profile-image">                                </td>
                                <td>
                                    <a href="" class="tx-inverse tx-14 tx-medium d-block">Gorgonio Magalpok</a>
                                    <span class="tx-11 d-block">Year 1</span>
                                </td>
                                <td class="tx-12">
                                    <span class="square-8 bg-success mg-r-5 rounded-circle"></span> LSC1802356
                                </td>
                                <td>Apr 10, 2017 4:40pm</td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- card -->
                </div><!-- col-6 -->
            </div><!--row -->
        </div><!--br-pagebody-->
@endsection



