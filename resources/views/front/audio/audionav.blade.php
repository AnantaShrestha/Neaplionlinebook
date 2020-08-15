

<div class="myaccount-tab-menu nav" role="tablist">
	<a  href="{{route('allAudio')}}" id="main-audio-all" class="{{ (request()->is('allAudio')) ? 'active' : '' }}"></i> All Audio</a> 
	@php
		use App\Http\Controllers\getController;
		$audiocategory=getController::getAudioCategory();
	@endphp
	@foreach($audiocategory as $audiocategories)
	<a href="#{{$audiocategories->name}}" class="audionavi" id="{{$audiocategories->id}}">{{$audiocategories->name}}</a> 
	@endforeach   
	                             
</div>