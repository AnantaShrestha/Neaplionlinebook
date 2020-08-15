<div class="hotnews">
	<h6 style="font-size:14px">Hot News (ताजा समाचार)</h6>
	@foreach($hotnews as $news)
	<div class="row" style="margin-bottom:15px">
		<div class="col-lg-4 col-md-4 col-sm-12" style="padding-right:0">
			<div class='hot-image'>
	    		<img style="width:100%" src="{{asset('images/news/'.$news->image)}}">
	    	</div>
	    </div>
	    <div class="col-lg-8 col-sm-12">
	    	<h5 style="font-size:13px"><a href="{{url('newsDetails',['id' => Crypt::encrypt($news->id) ])}}">{{$news->title}}</a></h5>
	    </div>
	</div>
	@endforeach
	{{$hotnews->render()}}
</div>
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
