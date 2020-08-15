
<div class="myaccount-tab-menu nav" role="tablist">
	<a  href="{{route('userdashboard')}}" class="{{ (request()->is('userdashboard')) ? 'active' : '' }}"></i> Dashboard</a> 
	<a href="{{route('accountDetails')}}" class="{{ (request()->is('accountDetails')) ? 'active' : '' }}">Account Details</a>
	<a href="{{route('payment')}}">Payment Details</a>         
</div>