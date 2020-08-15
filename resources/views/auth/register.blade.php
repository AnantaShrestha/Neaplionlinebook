@extends('front.layouts.default')
@section('head')
<title>Register -Nepali Online Book</title>
@endsection
@section('content')
<div class="breadcrumbs-area mb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-menu">
                    <ul>
                        <li><a href="{{route('/')}}">Home</a></li>
                        <li><a href="{{route('register')}}" class="active">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="user-login-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                        <div class="login-title text-center mb-30">
                            <h2>Register</h2>
                            
                        </div>

             </div>
            <div class="offset-lg-3 col-lg-6 col-md-12 col-12">
                <form method="POST" action="{{route('register')}}" accept-charset="UTF-8" class="loginForm" novalidate="novalidate">
                    @csrf
                    <div class="login-form">
                            <div class="single-login">
                                <label for="email">Name *</label>
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="single-login">
                                <label for="password">Email *</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="single-login">
                                <label for="password">Address *</label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="email">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="single-login">
                                <label for="password">Phone Number *</label>
                                <input id="phone_no" type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ old('phone_no') }}" required autocomplete="phone_no">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                             <div class="single-login">
                                <label for="password">Password *</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                             <div class="single-login">
                                <label for="password">Confirm Password </label>
                                 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                            </div>
                            <div class="single-login single-login-2">
                                
                                <input class="btn btn-primary" type="submit" value="Register">
                                
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
