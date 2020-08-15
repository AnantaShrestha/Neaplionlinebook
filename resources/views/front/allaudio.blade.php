@extends('front.layouts.default')
@section('head')
<title>Audio -Nepali Online Book</title>
@endsection
@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.plyr.io/3.5.6/plyr.css">

@endsection
@section('content')
<div class="breadcrumbs-area mb-30">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumbs-menu">
					<ul>
						<li><a href="{{route('/')}}">Home</a></li>
						<li><a href="{{route('allAudio')}}" class="active">Audio</a></li>
									
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="product-section mb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="product-block">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="entry-header-title" style="margin-top:20px;">
								<h2>Audio Category</h2>
							</div>
							@include('front.audio.audionav')
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
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div id="myaccountContent">
								<div class="myaccount-content">
									<li><h5>All Audio</h5></li>
           							<div id="load" style="position: relative;">
	    									@include('front.audio.audiolist')
	    							
	    							</div>
	    						</div>
	    					</div>
	    					 @if(!empty($advertisement[3]))
								 <div class="advetise" style="margin-top:30px">
								 	<img style='width:100%;height:150px' src="{{asset('images/advertisement/'.$advertisement[3]->image)}}">
								 </div>
								@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('script')
<script  src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.5.6/plyr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5media/1.1.8/html5media.min.js"></script>
<script type="text/javascript">
	var tracks;
$(document).ready(function(){
	var url;
	$(window).on('load',function(){
		url="{{route('getAudio')}}";
		callAjax(url);
	});
	$('.audionavi').on('click',function(){
		event.preventDefault();
		$('#plList').html('');
		var id=$(this).attr('id');
		$('#main-audio-all').removeClass('active');
		$('.audionavi').removeClass('active');
		$(this).addClass('active');
		
		url="{{url('getaudioCategory')}}"+'/'+id;
		callAjax(url);
	});
	function callAjax(url)
	{
		$.ajax({
			type:"get",
			url:url,
			success:function(data)
			{
					
					tracks=data;
					var count=1;
					$.each(data,function(i,audio){
					
						$('#plList').append('<li> \
			                    <div class="plItem"> \
			                        <span class="plNum">' + count + '.</span> \
			                        <span class="plTitle">' + audio.title + '</span> \
			                    </div> \
			              </li>');
						count++;
					})
					audioAction();
			}
		});
	}
	function audioAction(path)
	{
		jQuery(function ($) {
		    var supportsAudio = !!document.createElement('audio').canPlayType;
		    if (supportsAudio) {
		        // initialize plyr
		        var player = new Plyr('#audio1', {
		            controls: [
		                'restart',
		                'play',
		                'progress',
		                'current-time',
		                'duration',
		                'mute',
		                'volume',
		            ]
		        });
		        // initialize playlist and controls
		        var index = 0,
		            playing = false,
		            mediaPath = "{{asset('audio')}}",
		            extension = '',
		            trackCount = tracks.length,
		            npAction = $('#npAction'),
		            npTitle = $('#npTitle'),
		            audio = $('#audio1').on('play', function () {
		                playing = true;
		                npAction.text('Now Playing...');
		            }).on('pause', function () {
		                playing = false;
		                npAction.text('Paused...');
		            }).on('ended', function () {
		                npAction.text('Paused...');
		                if ((index + 1) < trackCount) {
		                    index++;
		                    loadTrack(index);
		                    audio.play();
		                } else {
		                    audio.pause();
		                    index = 0;
		                    loadTrack(index);
		                }
		            }).get(0),
		            btnPrev = $('#btnPrev').on('click', function () {
		                if ((index - 1) > -1) {
		                    index--;
		                    loadTrack(index);
		                    if (playing) {
		                        audio.play();
		                    }
		                } else {
		                    audio.pause();
		                    index = 0;
		                    loadTrack(index);
		                }
		            }),
		            btnNext = $('#btnNext').on('click', function () {
		                if ((index + 1) < trackCount) {
		                    index++;
		                    loadTrack(index);
		                    if (playing) {
		                        audio.play();
		                    }
		                } else {
		                    audio.pause();
		                    index = 0;
		                    loadTrack(index);
		                }
		            }),
		            li = $('#plList li').on('click', function () {
		                var id = parseInt($(this).index());
		                if (id !== index) {
		                    playTrack(id);
		                }
		            }),
		            loadTrack = function (id) {
		                $('.plSel').removeClass('plSel');
		                $('#plList li:eq(' + id + ')').addClass('plSel');
		                npTitle.text(tracks[id].name);
		                index = id;
		                audio.src = mediaPath + '/' + tracks[id].audio ;
		                //updateDownload(id, audio.src);
		            },
		            /*updateDownload = function (id, source) {
		                player.on('loadedmetadata', function () {
		                    $('a[data-plyr="download"]').attr('href', source);
		                });
		            },*/
		            playTrack = function (id) {
		                loadTrack(id);
		                audio.play();
		            };
		        /*extension = audio.canPlayType('audio/mpeg') ? '.mp3' : audio.canPlayType('audio/ogg') ? '.ogg' : '';*/
		        loadTrack(index);
		    } else {
		        $('.column').addClass('hidden');
		        var noSupport = $('#audio1').text();
		        $('.container').append('<p class="no-support">' + noSupport + '</p>');
		    }
		});
	}

});
</script>
@endsection