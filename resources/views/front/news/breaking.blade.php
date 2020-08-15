
@php
	$breaking=App\Admin\Breakingnews::find(1);
 @endphp
 <style>
    .box{
        padding-right:0 !important;
    }
    .break
    {
        padding-left:0;
    }
    @media only screen and (max-width: 360px) {
    .break-button
    {
        font-size:14px !important;
    }

    }
    @media only screen and (max-width: 640px) {
        .box{
        padding-right:15px !important;
    }
    .break
    {
        padding-left:15px !important;
    }
    
    }
 </style>
<div class="row" style="margin-bottom:20px">
	<div class="col-lg-3 col-md-3 col-sm-4 box">
		<button type="button" class="break-button">Breaking News</button>
	</div>
	<div class="col-lg-9 col-md-9 col-sm-8 break">
		<div class="news-border">
			<marquee scrollamount="2" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
				 <a href=""><p>{{$breaking->news}}</p>
									</a>
	         </marquee>
		</div>
	</div>
</div>