@extends('front.layouts.default')
@section('head')
<title>Contact Us -Nepali Online Book</title>
@endsection
@section('content')
<div class="breadcrumbs-area mb-30">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumbs-menu">
					<ul>
						<li><a href="{{route('/')}}">Home</a></li>
						<li><a href="{{route('contact')}}" class="active">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="contact-area mb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-12">
				<div class="contact-info">
					<h3>Contact info</h3>
					<ul>
						<li>
							<i class="fa fa-map-marker"></i>
							<span>Address: </span>
									 							
						</li>
						<li>
							<i class="fa fa-envelope"></i>
							<span>Phone: </span>
									
						</li>
						<li>
							<i class="fa fa-mobile"></i>
							<span>Email: </span>
							<a href="#"></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-12">
				<div class="contact-form">
					<h3><i class="fa fa-envelope-o"></i>Leave a Message</h3>
						@include('front.message')
                        {!! Form::open(array('url' => 'inquery','method' => 'POST','id' => 'contact-form')) !!}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-form-3">
                                            {{Form::text('name','',['placeholder' => 'Name'])}}                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-form-3">
                                            {{Form::email('email','',['placeholder' => 'Email'])}}
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single-form-3">
                                           {{Form::text('phone_no','',['placeholder' => 'Phone Number'])}}
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single-form-3">
                                           {{Form::text('subject','',['placeholder' => 'Subject'])}}
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                         <div class="single-form-3">
                                           {{Form::textarea('comment','',['placeholder' => 'Message...','rows'=>3])}}
                                            <button class="submit" type="submit">SEND MESSAGE</button>
                                        </div>
                                    </div>
                                </div>
                        {!!Form::close()!!}
                        <p class="form-messege"></p>
				</div>	
			</div>
		</div>
	</div>
</div>
@endsection