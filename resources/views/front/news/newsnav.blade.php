<div class="myaccount-tab-menu nav" role="tablist">
	<a  href="{{route('news')}}" class="{{ (request()->is('news')) ? 'active' : '' }}"></i> All News</a> 
	@php
		use App\Http\Controllers\getController;
		$newscategories=getController::getnewsCategory();
	@endphp
	@foreach($newscategories as $newscategory)
	<a href="{{url('newsCategory/'.$newscategory->slug)}}" class="{{ (request()->is('newsCategory/'.$newscategory->slug)) ? 'active' : '' }}">{{$newscategory->name}}</a> 
	@endforeach   
	                             
</div>

 