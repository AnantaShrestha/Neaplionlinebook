@extends('front.layouts.default')
@section('head')
<title>Hamro Radio -Nepali Online Book</title>
@endsection
@section('content')
<style type="text/css">
	body
	{
		background:#fff !important;
	}
    @media only screen and (max-width: 640px) {
  .radio-frame iframe {
    height:135px !important;
  }
}

	
</style>
<div class="breadcrumbs-area mb-40">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumbs-menu">
					<ul>
						<li><a href="{{route('/')}}">Home</a></li>
						<li><a href="{{route('hamroradio')}}" class="active">Hamro Radio</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<section class='radio mb-40' style="display:block;overflow:hidden">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 radio-frame">
                 <iframe scrolling="no" src="https://onlineradiobox.com/np/?cs=np.kantipur&played=1" style="width:100%;height:80px;display:block;overflow:hidden;border:0px"></iframe>
            </div>
            <div class="col-lg-12 radio-frame">
                 <iframe scrolling="no" src="https://onlineradiobox.com/np/?cs=np.nepal" style="width:100%;height:80px;display:block;overflow:hidden;border:0px"></iframe>
            </div>
            <div class="col-lg-12 radio-frame">
                 <iframe scrolling="no" src="https://onlineradiobox.com/np/?cs=np.audio&played=1" style="width:100%;height:80px;display:block;overflow:hidden;border:0px"></iframe>
            </div>
		</div>
	</div>
</section>
@endsection
