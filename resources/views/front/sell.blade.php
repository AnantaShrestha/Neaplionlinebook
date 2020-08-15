@extends('front.layouts.default')
@section('head')
<title>Sell Book -Nepali Online Book</title>
@endsection
@section('content')
<div class="breadcrumbs-area mb-30">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumbs-menu">
					<ul>
						<li><a href="{{route('/')}}">Home</a></li>
						<li><a href="{{route('sellBook')}}" class="active">Sell Books</a></li>
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
						</div>
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div id="myaccountContent">
								<div class="myaccount-content">
									<h5>Sell Books</h5>
           							<div id="load" style="position: relative;">
	    								<div class="row">
	    									@include('front/products/productlist')
	    						
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