@extends('front.layouts.default')
@section('head')
<title>{{$blogs->title}}</title>
<meta property="og:title" content="{{$blogs->title}}"/>
<meta property="og:url" content="{{Request::url()}}"/>
<meta property="og:image" content="{{asset('images/blog/'.$blogs->image)}}"/>
<meta property="og:description"
      content="{{$blogs->description}}"/>
@endsection
@section('content')
<style type="text/css">
	._5lm5._2pi3._3-8y {
	display: none;
}
</style>
<div class="breadcrumbs-area mb-30">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumbs-menu">
					<ul>
						<li><a href="{{route('/')}}">Home</a></li>
						<li><a href="{{url('blogdetails',['id' => Crypt::encrypt($blogs->id) ])}}" class="active">{{$blogs->title}}</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="single_blog mb-60">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-12">
				<div class="author-destils mb-30">
					<div class="author-left">
						<div class="author-img">
							<a href="#"><img src="{{asset('images/blog/'.$blogs->image)}}" alt="man"></a>
						</div>
						<div class="author-description">
							<p>Posted by: 
								<a><span>Admin</span></a>&nbsp;&nbsp;
								<a>Author : {{$blogs->author}}</a>
							</p>
							<span>Posted On : {{ date("M j, Y", strtotime($blogs->created_at))}}</span>
							
						</div>
					</div>
					<div class="author-right">
							<span></span>
							<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ea31c5ca513151b"></script>
							<div class="addthis_inline_share_toolbox"></div>
					</div>
				</div>
				<div class="img-section">
					<img src="{{asset('images/blog/'.$blogs->image)}}">
				</div>
				<div class="single-news-title">
					<h2>{{$blogs->title}}</h2>
					<p>{{$blogs->description}}</p>
				</div>
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=522742998420662&autoLogAppEvents=1"></script>
                <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="5" data-width="100%"></div> 
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12">
				<div class="related-news" style="margin-top:78px">
					<h3>Other Blogs</h3>
					@foreach($relatedblog as $blog)
					<div class="row" style="margin-bottom:20px">
						<div class="col-lg-4 col-md-4 col-sm-12" style="padding-right:0px">
							<div class="rel-img">
								<img style="width:100%" src="{{asset('images/blog/'.$blog->image)}}">
							</div>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-12" style="padding-right:0px">
							<div class="news-headtitle">
								<p style="font-size:16px;font-weight:600"><a href="{{url('blogdetails',['id' => Crypt::encrypt($blog->id) ])}}">{{$blog->title}}</a></p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
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
		</div>
	</div>
</div>
@endsection