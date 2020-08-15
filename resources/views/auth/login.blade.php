@extends('front.layouts.default')
@section('head')
<title>Login -Nepali Online Book</title>
@endsection
@section('content')
<div class="breadcrumbs-area mb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-menu">
                    <ul>
                        <li><a href="{{route('/')}}">Home</a></li>
                        <li><a href="{{route('login')}}" class="active">Login</a></li>
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
                            <h2>Login</h2>
                            
                        </div>

             </div>
            <div class="offset-lg-3 col-lg-6 col-md-12 col-12">
                    <form method="POST" action="{{route('login')}}" accept-charset="UTF-8" class="loginForm" novalidate="novalidate">
                    @csrf
                        <div class="login-form">
                                <div class="single-login">
                                    <label for="email">Email *</label>
                                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="single-login">
                                    <label for="password">Password *</label>
                                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="single-login single-login-2">
                                    
                                    <input class="btn btn-primary" type="submit" value="Log In">
                                    
                                </div>

                                 
                                    
                                    <a href="{{route('register')}}" style="display:block;color:#fff" class="btn btn-primary">
                                    {{ __('Register Now') }}
                                    </a>
                               

                                <a href="{{route('password.request')}}">Forgot Password?</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
  
@endsection
