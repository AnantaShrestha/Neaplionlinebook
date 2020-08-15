@extends('front.layouts.default')
@section('head')
<title>{{$singleNews->title}}</</title>
<meta property="og:title" content="{{$singleNews->title}}"/>
<meta property="og:url" content="{{Request::url()}}"/>
<meta property="og:image" content="{{asset('images/news/'.$singleNews->image)}}"/>
<meta property="og:description"
      content="{{$singleNews->description}}"/>
@endsection
@section('content')
<div class="breadcrumbs-area mb-30">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumbs-menu">
					<ul>
						<li><a href="{{route('/')}}">Home</a></li>
						<li><a href="{{url('productDetails',['id' => Crypt::encrypt($singleNews->id) ])}}" class="active">{{$singleNews->title}}</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="singleNews mb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-12">
				<div class="news-image">
					<img style="width:100%;" src="{{asset('images/news/'.$singleNews->image)}}">
				</div>
				<div class="new-content" style="margin-top:20px">
					<h2 style="font-size:28px">{{$singleNews->title}}</h2>
					<p style="font-size:15px;line-height:28px;text-align:justify">{{$singleNews->description}}</p>
					<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ea31c5ca513151b"></script>
					<div class="addthis_inline_share_toolbox" data-href="{{Request::url()}}"></div> 
					
				</div>
				<div class="comment">
					<div id="fb-root"></div>
	                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=522742998420662&autoLogAppEvents=1"></script>
	                <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="5" data-width="100%"></div>
				</div>
				
    
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12">
				<h6 style="font-size:14px">News Category (ताजा समाचार)</h6>
				@include('front.news.newsnav')
				<br><br>

				@include('front.news.hotnews')
			</div>
		</div>
	</div>
</section>
@endsection