@foreach($newslisting as $news)
	<div class="row" style="margin-bottom:30px">
			<div class="col-lg-4 col-md-4 col-sm-12">
				<div class="newsimage">
					<img style="width:100%" src="{{asset('images/news/'.$news->image)}}">
				</div>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-12">
				<div class="news-title">
					<h2 style="font-size:18px;margin:0"><a href="{{url('newsDetails',['id' => Crypt::encrypt($news->id) ])}}">{{$news->title}}</a></h2>
					<p style="font-size:14px;">{{ date("M j, Y", strtotime($news->date))}}</p>
				</div>
				<p style="font-size:14px;line-height:28px">{{ \Illuminate\Support\Str::limit($news->description,220,'...') }}&nbsp;<a href="{{url('newsDetails',['id' => Crypt::encrypt($news->id) ])}}">[ Read More ]</a></p>

			</div>
	</div>
@endforeach

{{$newslisting->render()}}