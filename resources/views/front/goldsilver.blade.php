@extends('front.layouts.default')
@section('head')
<title>Gold-Silver -Nepali Online Book</title>
@endsection
@section('content')
<div class="breadcrumbs-area mb-30">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumbs-menu">
					<ul>
						<li><a href="{{route('/')}}">Home</a></li>
						<li><a href="{{route('gold.sliver')}}" class="active">Gold/Sliver</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="gold-silver mb-70">
	<div class="container">
		<div class="gold-sliver-block ">
			<iframe src="https://www.ashesh.com.np/gold/widget.php?api=251173j452&amp;header_color=0077e5" rel="nofollow" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:100%; height:265px; border-radius:5px;" allowtransparency="true" frameborder="0">
			</iframe>
		</div>
	</div>
@endsection