@extends('front.layouts.default')
@sectoin('head')
<title>Currency -Nepali Online Book</title>
@endsection
@section('content')
<div class="breadcrumbs-area mb-30">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumbs-menu">
					<ul>
						<li><a href="{{route('/')}}">Home</a></li>
						<li><a href="{{route('currency')}}" class="active">Currenct</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="currency mb-60">
	<div class="container">
		<iframe src="https://www.ashesh.com.np/forex/widget2.php?api=8112y3j319" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:100%; height:400px; border-radius:5px;" allowtransparency="true" frameborder="0"></iframe>
	</div>
</section>
@endsection