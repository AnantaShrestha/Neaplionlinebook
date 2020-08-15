@extends('front.layouts.default')
@section('head')
<title>Dashboard -Nepali Online Book</title>
@endsection
@section('content')
<div class="breadcrumbs-area mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-menu">
                            <ul>
                                <li><a href="{{route('/')}}">Home</a></li>
                                <li><a href="{{route('userdashboard')}}" class="active">Dashboard</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
</div>

<section class="product-section mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-block">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6">
                           
                            @include('front.users.usernav')
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12">
                            <div id="myaccountContent">
                                <div class="myaccount-content">
                                    <h5>Dashboard</h5>
                                    <div id="load" style="position: relative;">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="cart-back" style="background:#337aff;width:100%;padding:10px;text-align:center;">
                                                    <p style="color:#fff;font-size:16px">Total Number of Book In Cart</p>
                                                    <p style="color:#fff;font-size:16px;marign-bottom:0px">{{$cart}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="cart-back" style="background:#0fa721;width:100%;padding:10px;text-align:center;">
                                                    <p style="color:#fff;font-size:16px">Total Number of Paid Book</p>
                                                    <p style="color:#fff;font-size:16px;marign-bottom:0px">{{count(@$productArr)}}</p>
                                                </div>
                                            </div>
                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection