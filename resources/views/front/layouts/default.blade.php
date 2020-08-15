 @php
    use App\Http\Controllers\getController;
    $sitesetting=getController::getSitesetting();
    if(Auth::check())
    {
        $cartCount=getController::getcartNumber();
    }

   
@endphp
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @section('head')
    @show
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo/'.$sitesetting->logo)}}">
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/meanmenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/flexslider.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">
    @section('style')
    @show

    <script src="{{asset('front/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <script src="{{asset('front/js/vendor/jquery-1.12.0.min.js')}}"></script>
    <!-- cell pay -->
    <script type="text/javascript">!function(e,t){"object"==typeof exports&&"object"==typeof module?module.exports=t():"function"==typeof define&&define.amd?define([],t):"object"==typeof exports?exports.CellPay=t():e.CellPay=t()}(window,(function(){return function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}return n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(r,o,function(t){return e[t]}.bind(null,o));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=0)}([function(e,t){!function(e,t,n,r,o,u,f){e.CellPayButtonObject=o,e[o]=e[o]||function(){(e[o].q=e[o].q||[]).push(arguments)},e[o].dt=1*new Date,u=t.createElement("script"),f=t.getElementsByTagName("script")[0],u.async=1,u.src="https://widget.cellpay.com.np/embed.js",f.parentNode.insertBefore(u,f)}(window,document,0,0,"CellPayPayment")}]).default}));</script>
    <!-- khalit checkout  -->
    <script src="https://unpkg.com/khalti-checkout-web@latest/dist/khalti-checkout.iffe.js"></script> 
</head>

<body>


<header>
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="con-details">
                            <ul>
                               <li><i class="fa fa-phone"></i>&nbsp;&nbsp;{{$sitesetting->contact}}</li>
                               <i class="fa fa-envelope"></i>&nbsp;&nbsp;{{$sitesetting->email}} </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="account-area text-right">
                            <ul>
                                <li><a href="{{route('aboutus')}}">About Us</a></li>
                               @if(Auth::guest())
                                <li><a href="{{route('register')}}" class="register">Register</a></li>
                                <li><a href="{{route('login')}}" class="login">Login</a></li>
                                @else
                                    <li><a href="{{route('userdashboard')}}">Dashboard</a></li>
                                    <li>
                                        <a href="{{route('logout')}}"
                                         onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none;">
                                            @csrf
                                        </form>
                                    </li>
                                @endif
                              
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="header-mid-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-5 col-12">
                        <div class="header-search mt-30">
                            <form action="{{route('search')}}" method="post">
                                @csrf
                                <input type="text" name="product" placeholder="Search for book" />
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-12">
                        <div class="logo-area text-center logo-xs-mrg">
                            <a href="{{route('/')}}"><img src="{{asset('images/logo/'.$sitesetting->logo)}}" alt="logo" /></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="my-cart mt-16">
                            <ul>
                                <li><a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i>My Cart</a>
                                    @if(Auth::guest())
                                        <span>0</span>
                                    @else
                                        <span>{{$cartCount}}</span>
                                    @endif
                                   
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
        <div class="main-menu-area d-md-none d-none d-lg-block sticky-header-1" id="header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="menu-area">
                            <nav>
                                <ul>
                                    <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="{{route('/')}}">Home</a>
                                       
                                    </li>
                                    <li class="{{ (request()->is('allBook')) ? 'active' : '' }}"><a href="{{route('allBook')}}">All Books</a></li>
                                   
                                    <li class="{{ (request()->is('news')) ? 'active' : '' }}"><a href="{{route('news')}}">News</a></li>
                                     <li class="{{ (request()->is('blog')) ? 'active' : '' }}"><a href="{{route('blog')}}">Blog</a></li>
                                     <li class="{{ (request()->is('allAudio')) ? 'active' : '' }}"><a href="{{route('allAudio')}}">Audio</a></li>
                                    <li class="{{ (request()->is('hamroRadio')) ? 'active' : '' }}"><a href="{{route('hamroradio')}}">Hamro  Radio</a></li>
                                   <li class="{{ (request()->is('contact')) ? 'active' : '' }}"><a href="{{route('contact')}}">Contact Us</a></li>
                                    <li><a href="#">Others<i class="fa fa-angle-down"></i></a>
                                         <div class="sub-menu sub-menu-2">
                                            <ul>
                                                <li><a href="{{route('currency')}}">Currency</a></li>
                                                <li><a href="{{route('rasifall')}}">राशीफल</a></li>
                                                <li><a href="{{route('gold.sliver')}}">Gold/SLiver</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-menu-area-end -->
        <!-- mobile-menu-area-start -->
        <div class="mobile-menu-area d-lg-none d-block fix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                                <ul id="nav">
                                    <li><a href="{{route('/')}}">Home</a>
                                    </li>
                                    <li><a href="{{route('allBook')}}">All Books</a></li>
                                    <li><a href="{{route('news')}}">News</a></li>
                                    <li><a href="{{route('blog')}}">Blog</a></li>
                                    <li><a href="{{route('allAudio')}}">Audio</a></li>
                                    <li><a href="{{route('hamroradio')}}">Hamro Radio</a></li>
                                    <li><a href="{{route('contact')}}">Contact Us</a></li>
                                    <li><a href="#">Other</a>
                                        <ul>
                                            <li><a href="{{route('currency')}}">Currency</a></li>
                                            <li><a href="{{route('rasifall')}}">राशीफल</a></li>
                                            <li><a href="{{route('gold.sliver')}}">Gold/Silver</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>

	@yield('content')


<div class="social-group-area ptb-70">
        <div class="container">
            <div class="row">
          
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="section-title-3">
                        <h3>Our Payment Partner</h3>
                    </div>
                    <div class="link-follow">
                        <ul>
                            <li><a href="#"><img src="{{asset('front/esewa.png')}}"></a></li>
                            <li><a href="#"><img src="{{asset('front/cellpay.png')}}"></a></li>
                            <li><a href="#"><img src="{{asset('front/prabhu.png')}}"></a></li>
                            <li><a href="#"><img src="{{asset('front/khalti.jpg')}}"></a></li>
                            <li><a href="#"><img src="{{asset('front/ime.jpg')}}"></a></li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</div>
  
<footer>
       
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-top-menu bb-2">
                            <nav>
                                <ul>
                                    <li><a href="{{route('aboutus')}}">About Us</a></li>
                                    <li><a href="{{route('news')}}">News</a></li>
                                    <li><a href="{{route('blog')}}">Blog</a></li>
                                    <li><a href="{{route('contact')}}">contact us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="footer-mid ptb-50">
            <div class="container">
                 <div class="row">
                     <div class="col-lg-3 col-md-12">
                                    <div class="single-footer br-2 xs-mb">
                                        <div class="footer-title mb-20">
                                            <h3>Store INfomation</h3>
                                        </div>
                                        <div class="footer-contact">
                                            <p>नेपाली अनलाईन बुक</p>
                                            <p>
                                                <span>Location : {{$sitesetting->address}}</span>
                                                
                                            </p>
                                            <p><span>Phone no : {{$sitesetting->contact}}</span></p>
                                            <p><span>Email: {{$sitesetting->email}}</span> </p>
                                        </div>
                                    </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-12">
                            <div class="single-footer br-2 xs-mb">
                                 <div class="footer-title mb-20">
                                    <h3>Useful Link</h3>
                                 </div>
                                <div class="footer-mid-menu">
                                            <ul>
                                                <li><a href="{{route('/')}}">Home</a></li>
                                                <li><a href="{{route('allBook')}}">ALL Book</a></li>
                                                <li><a href="{{route('blog')}}">Blog</a></li>
                                                <li><a href="{{route('news')}}">News</a></li>
                                                <li><a href="{{route('contact')}}">Contact Us</a></li>
                                            </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-12">
                                    <div class="single-footer br-2 xs-mb">
                                        <div class="footer-title mb-20">
                                            <h3>Facebook Page</h3>
                                        </div>
                                        <div class="footer-mid-menu"style="padding-right:30px">
                                           <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fnepalionlinebook%2F&tabs=timeline&width=250&height=250&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="150" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                                        </div>
                                    </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-12">
                                    <div class="single-footer xs-mb">
                                        <div class="footer-title mb-20">
                                            <h3>Books Category</h3>
                                        </div>
                                        <div class="footer-mid-menu">
                                               <ul>
                                                @php
                                                    $bookcategory=App\Admin\Category::where('status',1)->limit(3)->get();
                                                @endphp
                                                <li><a href="{{route('freeBook')}}">Free Book</a></li>
                                                <li><a href="{{route('sellBook')}}">Sell Book</a></li>
                                                @foreach($bookcategory as $category)
                                                    <li><a href="{{url('categoryBook/'.$category->slug)}}">{{$category->name}}</a></li>
                                                @endforeach
                                               
                                            </ul> 
                                        </div>
                                    </div>
                        </div>
                       
                 </div>
            </div>
        </div>
        <!-- footer-mid-end -->
        <!-- footer-bottom-start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row bt-2">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="copy-right-area">
                            <p>Copyright © <?php echo date("Y"); ?><a href="#">Momtech Nepal</a>. All Right Reserved.</p>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
      
</footer>
  



    <script src="{{asset('front/js/popper.min.js')}}"></script>
  
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('front/js/owl.carousel.min.js')}}"></script>

    <script src="{{asset('front/js/jquery.meanmenu.js')}}"></script>

    <script src="{{asset('front/js/wow.min.js')}}"></script>

    <script src="{{asset('front/js/jquery.parallax-1.1.3.js')}}"></script>

    <script src="{{asset('front/js/jquery.flexslider.js')}}"></script>

    <script src="{{asset('front/js/plugins.js')}}"></script>

    <script src="{{asset('front/js/main.js')}}"></script>
     <script type="text/javascript">
        (function(){
            $.ajax({
                url:"{{url('uniqueVisitor')}}",
                type:"post",
                data:{"_token": "{{ csrf_token() }}"},
                success:function(data)
                {
                    console.log(data);
                }
            });
        })();
    </script>
    @section('script')
    
    @show
   
</body>
</html>