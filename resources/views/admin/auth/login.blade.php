<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/login.css')}}">


</head>
<body>
    <div class="wrapper">
    <div class="container">
        <h1>Welcome Admin</h1>
        @if (session()->has('message'))
              <p class="alert alert-success" style="color:green">{{ session('message') }}</p>
          @endif
        <form class="form" method="POST" action="{{ route('admin.admin-login') }}">
            @csrf

            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
              @error('email')
                 <span class="invalid-feedback" role="alert">
                      <strong style="color:red">{{ $message }}</strong>
                  </span>
                  <br>
              @enderror

             <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
              @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong style="color:red" style="color:red">{{ $message }}</strong>
                </span>
                 <br>
              @enderror
            <button type="submit" class="btn btn-primary" id="login-button">
                                    {{ __('Login') }}</button>
                                <br><br>
  
                <a class="btn btn-link" href="{{route('admin.password.email')}}">
                    {{ __('Forgot Your Password?') }}
                </a>
            
        </form>
    </div>
    
    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
         <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
         <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>


<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>