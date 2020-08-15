@extends('front.layouts.default')
@section('head')
<title>Rashifal -Nepali Online Book</title>
@endsection
@section('content')
<div class="breadcrumbs-area mb-30">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumbs-menu">
					<ul>
						<li><a href="{{route('/')}}">Home</a></li>
						<li><a href="{{route('rasifall')}}" class="active">राशीफल</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="horescope mb-60">
	<div class="container">
		<iframe src="https://www.ashesh.com.np/rashifal/widget.php?header_title=Nepali Rashifal&amp;header_color=f0b03f&amp;api=6020x8j318" scrolling="yes" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:100%; height:600px; border-radius:5px;" allowtransparency="true" frameborder="0">
        </iframe>
	</div>
</section>
@endsection