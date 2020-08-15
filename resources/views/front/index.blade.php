@extends('front.layouts.default')
@section('head')
<title>Home -Nepali Online Book</title>
@endsection
@section('content')

@include('front.message')
<div class="slider-area">
    <div class="slider-active owl-carousel">
            @foreach($sliders as $key=>$slider)
            <div class="single-slider pt-125 pb-130 bg-img" style="background:url('{{asset('images/slider/'.$slider->image)}}')no-repeat;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="slider-content slider-animated-1 text-center">
                                <h1 style="font-size:38px;color:#000">{{$slider->title}}</h1>
                                <h3 style="font-size:18px">{{$slider->description}}</h3>
                                @if($key % 2 == 0)
                                <a href="{{route('aboutus')}}">About Us</a>
                                @else
                                <a href="{{route('contact')}}">Contact Us</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
    </div>
</div>
    <!-- product-area-start -->
<div class="product-area pt-50 xs-mb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-50">
                        <h2>Book category</h2>
                        
                    </div>
                </div>
                <div class="col-lg-12">
                    <!-- tab-menu-start -->
                    <?php
					    use App\Http\Controllers\getController;
					    $categories=getController::getCategory();
					?>

                    <div class="tab-menu mb-40 text-center">
                        <ul class="nav justify-content-center">
                            @foreach($categories as $key=>$category)
                            <li><a class="<?php if($key==0) echo'active'; ?>" href="#{{$category->name}}" data-toggle="tab">{{$category->name}} </a></li>
                           @endforeach
                        </ul>
                    </div>
                    <!-- tab-menu-end -->
                </div>
            </div>
            <!-- tab-area-start -->
            <div class="tab-content">
                @foreach($categories as $key=>$category)
                <div class="tab-pane fade <?php if($key==0) echo 'show active'; ?>" id="{{$category->name}}">
                    
                    <div class="tab-active owl-carousel">
                        <!-- single-product-start -->
                        @foreach($category->books as $products)
        
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="{{url('singleProduct',['id' => Crypt::encrypt($products->id) ])}}">
                                        <img src="{{asset('images/books/'.$products->image)}}" alt="book" class="primary" />
                                    </a>
                                     
                                        <div class="product-flag">
                                            <ul>
                                                <li>
                                                    @if($products->free==1)
                                                    <span class="sale">For Free</span> 
                                                    @elseif($products->upcoming==1)
                                                    <span class="sale">Upcoming</span> 
                                                    @else
                                                    <span class="sale">For Sales</span> 
                                                    @endif


                                                </li>    
                                            </ul>
                                        </div>
                                    <div class="quick-view">
                                        <a class="action-view" href="{{url('productDetails',['id' => Crypt::encrypt($products->id) ])}}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-details text-center">
                                    <h4><a href="{{url('productDetails',['id' => Crypt::encrypt($products->id) ])}}">{{$products->name}}</a></h4>
                                    <div class="product-price">
                                        <ul>
                                             @if($products->free==0)<li>Rs {{$products->price}}</li>@else
                                                <li>Rs 0</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                        <!-- single-product-end -->
                        
                    </div>
                </div>
                @endforeach
                
                
            </div>
            <!-- tab-area-end -->
        </div>
</div>
 @php
 $advertisement=App\Admin\Advertisement::where(['page'=>'Home','status'=>1])->limit(4)->get();
 @endphp
 @if(!empty($advertisement[0]))
 <div class="advetise" style="margin-top:40px">
     <div class="container">
         <img src="{{asset('images/advertisement/'.$advertisement[0]->image)}}" style="width:100%;height:150px">
     </div>
 </div>
 @endif
<!-- product-area-end -->
<div class="bestseller-area ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="bestseller-content">
                        <h1>About Us</h1>
                        <h2>Nepali Online Book</h2>
                        @php
                            $sitesetting=getController::getSitesetting();
                        @endphp
                        <p>{{ \Illuminate\Support\Str::limit($sitesetting->about,2000,'...') }}</p>
                      
                       
                    </div>
                   <a href="{{route('aboutus')}}" class="btn btn-primary">Read More</a>
                </div>
                 <div class="col-lg-4 col-md-12 col-12">
                    <div class="bestseller-active owl-carousel">
                        @php
                        $upcomingProduct=App\Admin\Product::where('upcoming',1)->orderBy('created_at','DESC')->get();

                        @endphp
                        @foreach($upcomingProduct->chunk(2) as $upcoming)
                        <div class="bestseller-total">
                            @foreach($upcoming as $value)
                            <div class="single-bestseller mb-25">
                                <div class="bestseller-img">
                                    <a href="#"><img src="{{asset('images/books/'.$value->image)}}" alt="book" /></a>
                                    <div class="product-flag">
                                        <ul>
                                            <li><span class="sale">Upcoming</span></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div class="bestseller-text text-center">
                                    <h3> <a href="{{url('singleProduct',['id' => Crypt::encrypt($value->id) ])}}">{{$value->name}}</a></h3>
                                    <div class="price">
                                        <ul>

                                            <li><span class="new-price">Rs{{$value->price}}</span>
                                    

                                            </li>
                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                           
                        </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>
</div>
<div class="advetise">
     <div class="container">
         <img src="{{asset('images/advertisement/'.$advertisement[1]->image)}}" style="width:100%;height:150px">
     </div>
 </div>
<div class="new-book-area pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title bt text-center pt-70 mb-30 section-title-res">
                    <h2>All Books</h2>
                </div>
            </div>
         </div>
        <div class="all-book">
            <div class="row">
                @include('front.products.productlist')
            </div>
        </div>
    </div>
</div>
<div class="advetise" style="margin-bottom:60px">
     <div class="container">
         <img src="{{asset('images/advertisement/'.$advertisement[2]->image)}}" style="width:100%;height:150px">
     </div>
 </div>
    <!-- recent-post-area-start -->
<div class="recent-post-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-30 section-title-res">
                        <h2>Latest from our blog</h2>
                    </div>
                </div>
                <div class="post-active owl-carousel text-center">
                    @foreach($blogs as $blog)
                    <div class="col-lg-12">
                        <div class="single-post">
                            <div class="post-img">
                                <a href=""><img src="{{asset('images/blog/'.$blog->image)}}" alt="post" /></a>
                                <div class="blog-date-time">
                                    <span class="day-time">{{$blog->created_at->format('d')}}</span>
                                    <span class="moth-time">{{ date("M", strtotime($blog->created_at))}}</span>
                                </div>
                            </div>
                            <div class="post-content">
                                <h3><a href="#">{{$blog->title}}</a></h3>
                                <span class="meta-author"> {{$blog->author}} </span>
                                <p>{{ \Illuminate\Support\Str::limit($blog->description,150,'...') }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
</div>
@if(!empty($advetisement[3]))
<div class="advetise" style="margin:60px 0">
     <div class="container">
         <img src="{{asset('images/advertisement/'.$advertisement[3]->image)}}" style="width:100%;height:150px">
     </div>
 </div>
 @endif
    <!-- recent-post-area-end -->
@endsection