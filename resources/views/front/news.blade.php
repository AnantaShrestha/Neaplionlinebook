@extends('front.layouts.default')
@section('head')
<title>News -Nepali Online Book</title>
@endsection
@section('content')
<div class="breadcrumbs-area mb-30">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumbs-menu">
					<ul>
						<li><a href="{{route('/')}}">Home</a></li>
						<li><a href="{{route('news')}}" class="active">News</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="product-section mb-70">
	<div class="container">
		@include('front.news.breaking')
		<div class="row">
			<div class="col-lg-12">
				
				<div class="product-block">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="entry-header-title" style="margin-top:20px;">
								<h2>News Category</h2>
							</div>
							@include('front.news.newsnav')
							 @if(!empty($advertisement[0]))
							 <div class="advetise" style="margin-top:30px">
							 	<img src="{{asset('images/advertisement/'.$advertisement[0]->image)}}">
							 </div>
							@endif
							<br><br>
							@include('front.news.hotnews')
						</div>
						<div class="col-lg-9 col-md-9 col-sm-12">
							<div id="myaccountContent">
								<div class="myaccount-content">
									<h5>All News</h5>
           							<div id="load" style="position: relative;">
	    
	    									@include('front.news.newslist')		
	    							</div>
	    						</div>
	    					</div>
	    					 @if(!empty($advertisement[3]))
							  <div class="advetise" style="margin-top:30px">
							 	<img src="{{asset('images/advertisement/'.$advertisement[3]->image)}}" style="width:100%;height:150px">
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