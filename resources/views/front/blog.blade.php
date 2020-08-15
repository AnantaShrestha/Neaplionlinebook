@extends('front.layouts.default')
@section('head')
<title>Blog -Nepali Online Book</title>
@endsection
@section('content')
<div class="breadcrumbs-area mb-30">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumbs-menu">
					<ul>
						<li><a href="{{route('/')}}">Home</a></li>
						<li><a href="{{route('blog')}}" class="active">Blog</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="blog-main-area mb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-12 col-12 order-lg-1 order-2 mt-sm-50">
				<div class="single-blog mb-50">
					<div class="entry-header-title" style="margin-top:20px;">
						<h2>Book Category</h2>
					</div>
					@include('front.products.productnav')
					<div class="entry-header-title" style="margin-top:20px;">
						<h2>News Category</h2>
					</div>
					@include('front.news.newsnav')
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
			<div class="col-lg-9 col-md-12 col-12 order-lg-2 order-1">
				<div class="blog-main-wrapper">
					@foreach($blogs as $blog)
						<div class="single-blog-post">
							<div class="blog-img mb-30">
								<img src="{{asset('images/blog/'.$blog->image)}}" alt="blog">
							</div>
							<div class="single-blog-content">
								<div class="single-blog-title">
										<h3>{{$blog->title}}</h3>
								</div>
								<div class="blog-single-content">
									<p style="font-size:14px">{{ \Illuminate\Support\Str::limit($blog->description,150,'...') }}</p>
								</div>
								<div class="author">
									<div class="row">
										<div class="col-lg-8 col-md-8 col-sm-12">
											<div class="author-name">
												<p>Post By : Admin || Author : {{$blog->author}} ||  {{$blog->created_at->diffForHumans()}}</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="blog-comment-readmore">
									<div class="blog-readmore">
										<a href="{{url('blogDetails',['id' => Crypt::encrypt($blog->id) ])}}">Read more<i class="fa fa-long-arrow-right"></i></a>
									</div>
							</div>
						</div>
					@endforeach
					{{$blogs->render()}}
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
@endsection