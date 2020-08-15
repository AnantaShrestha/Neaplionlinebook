@extends('front.layouts.default')
@section('head')
<title>{{$category->name}} -Nepali Online Book</title>
@endsection
@section('content')
<div class="breadcrumbs-area mb-30">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumbs-menu">
					<ul>
						<li><a href="{{route('/')}}">Home</a></li>
						<li><a href="{{url('categoryBook/'.$category->slug)}}" class="active">{{$category->name}}</a></li>
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
							<div class="entry-header-title" style="margin-top:20px;">
								<h2>Book Category</h2>
							</div>
							@include('front.products.productnav')
							 @if(!empty($advertisement[0]))
							 <div class="advetise" style="margin-top:30px">
							 	<img src="{{asset('images/advertisement/'.$advertisement[0]->image)}}">
							 </div>
							@endif
							@if(!empty($advertisement[1]))
							 <div class="advetise" style="margin-top:30px">
							 	<img src="{{asset('images/advertisement/'.$advertisement[1]->image)}}">
							 </div>
							 @endif
							 @if(!empty($advertisement[2]))
							  <div class="advetise" style="margin-top:30px">
							 	<img src="{{asset('images/advertisement/'.$advertisement[2]->image)}}">
							 </div>
							 @endif
 
						</div>
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div id="myaccountContent">
								<div class="myaccount-content">
									<h5>{{$category->name}}</h5>
           							<div id="load" style="position: relative;">
	    								<div class="row">
	    									@include('front/products/productlist')
	    						
	    								</div>
	    							</div>
	    						</div>
	    					</div>
	    					@if(!empty($advertisement[3]))
							  <div class="advetise" style="margin-top:30px">
							 	<img style="width:100%;height:150px" src="{{asset('images/advertisement/'.$advertisement[3]->image)}}">
							 </div>
							 @endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection