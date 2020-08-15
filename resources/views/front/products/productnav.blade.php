<div class="myaccount-tab-menu nav" role="tablist">
	<a  href="{{route('allBook')}}" class="{{ (request()->is('allBook')) ? 'active' : '' }}"></i> All Books</a> 
	@php
		use App\Http\Controllers\getController;
		$categories=getController::getCategory();
	@endphp 
	@foreach($categories as $category)
	<a href="{{url('categoryBook/'.$category->slug)}}" class="{{ (request()->is('categoryBook/'.$category->slug)) ? 'active' : '' }}">{{$category->name}}</a> 
	@endforeach   
	<a  href="{{route('freeBook')}}" class="{{ (request()->is('freeBook')) ? 'active' : '' }}"></i> Free Book</a> 
	<a  href="{{route('sellBook')}}" class="{{ (request()->is('sellBook')) ? 'active' : '' }}"></i> Sell Book</a>                                
</div>
