@extends('front.layouts.default')
@section('head')
<title>Account Details -Nepali Online Book</title>
@endsection
@section('content')
<div class="breadcrumbs-area mb-30">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumbs-menu">
					<ul>
						<li><a href="{{route('/')}}">Home</a></li>
						<li><a href="{{route('accountDetails')}}" class="active">Account</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="my-account-wrapper mb-70">
    <div class="container">
        <div class="section-bg-color">
            <div class="row">
                <div class="col-lg-12">
                
                   <div class="myaccount-page-wrapper">
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                @include('front.users.usernav')
                            </div>
                           
                            <div class="col-lg-9 col-md-8">
                                <div class="myaccount-content">
                                                    <h5>Account Details</h5>
                                    <div class="account-details-form">
                                                            
                                       <div class="single-input-item">
                                            <label for="display-name" class="required">Full  Name</label>
                                            <input type="text" value="{{Auth::user()->name}}" id="display-name"  readonly>
                                        </div>
                                        <div class="single-input-item">
                                            <label for="email" class="required">Email Addres</label>
                                            <input type="email" value="{{Auth::user()->email}}" id="email"  readonly>
                                        </div>
                                           <div class="single-input-item">
                                            <label for="address" class="required">Addres</label>
                                            <input type="text" value="{{Auth::user()->address}}" id="address" readonly>
                                        </div>
                                           <div class="single-input-item">
                                            <label for="phone_no" class="required">Phone No</label>
                                            <input type="text" value="{{Auth::user()->phone_no}}" id="phone_no" readonly>
                                        </div>
                                        <fieldset>
                                           <legend>Password change</legend>
                                             @include('front.message')
                                            <form id="userPasswordForm" method="post" action="{{url('changePasswordUser')}}">
                                             @csrf
                                                    <div class="single-input-item">
                                                        <label for="current-pwd" class="required">Current Password</label>
                                                         <input type="password" id="current-pwd" name="current_password" placeholder="Current Password" required>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                 <label for="new-pwd" class="required">New Password</label>
                                                                   <input type="password" id="new-pwd" name="new_password" placeholder="New Password" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="confirm-pwd" class="required">Confirm Password</label>
                                                                    <input type="password" id="confirm" name="confirm_password" placeholder="Confirm Password" required>
                                                            </div>
                                                         </div>
                                                    </div>
                                                <div class="single-input-item">
                                                	 <button type="submit" class="btn btn-sqr">Change Password</button>
                                                </div>
                                            </form>
                                        </fieldset>
                                                            
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div> 
            
                </div>
			</div>
        </div>
    </div>
</div>
</section>
@endsection
