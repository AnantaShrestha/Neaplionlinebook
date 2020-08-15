@extends('front.layouts.default')
@section('head')
    <title>About Us -Nepali Online Book</title>
@endsection
@section('content')
<div class="breadcrumbs-area mb-30">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumbs-menu">
					<ul>
						<li><a href="{{route('/')}}">Home</a></li>
						<li><a href="{{route('aboutus')}}" class="active">About Us</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="about mb-30">
	<div class="container">
		<div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="bestseller-content">
                        <h2>Nepali Online Book</h2>
                        @php
						    use App\Http\Controllers\getController;
						    $sitesetting=getController::getSitesetting();
						@endphp
                        <p>{{$sitesetting->about}}</p>
                      
                       
                    </div>
                </div>
        </div>
        <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="bestseller-content">
                        <h3>What we do</h3>
                       
                        <p style="margin:15px 0">{{$sitesetting->what}}</p>
                      
                       
                    </div>
                </div>
        </div>
        <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="bestseller-content">
                        <h3>Mission</h3>
                       
                        <p style="margin:15px 0">{{$sitesetting->mission}}</p>
                      
                       
                    </div>
                </div>
        </div>
        <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="bestseller-content">
                        <h3>Vision</h3>
                       
                        <p style="margin:15px 0">{{$sitesetting->visioni}}</p>
                      
                       
                    </div>
                </div>
        </div>
	</div>
</section>
@endsection
