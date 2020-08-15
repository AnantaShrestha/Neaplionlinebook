@extends('front.layouts.default')
@section('head')
<title>{{$singleProduct->name}} -Nepali Online Book</title>
<meta property="og:name" content="{{$singleProduct->name}}"/>
<meta property="og:url" content="{{Request::url()}}"/>
<meta property="og:image" content="{{asset('images/books/'.$singleProduct->image)}}"/>
<meta property="og:author" content="{{$singleProduct->author}}"/>
<meta property="og:description"
      content="{{$singleProduct->description}}"/>
<style>
    .product-star li{
        float:left;
        line-height:40px;
        margin-right:8px;
        color:#D6216E;
    }
	@media only screen and (max-width: 360px) {
        .p-i{
        padding:15px !important;
    }
    .p-d
    {
        padding:15px !important;
    }
    
    }
</style>
@endsection
@section('content')
<div class="breadcrumbs-area mb-30">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="breadcrumbs-menu">
					<ul>
						<li><a href="{{route('/')}}">Home</a></li>
						<li><a href="{{url('productDetails',['id' => Crypt::encrypt($singleProduct->id) ])}}" class="active">{{$singleProduct->name}}</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="product-main-area mb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 order-lg-1 order-1" style="padding-left:0px;padding-right:0px">		
				<div class="product-main-area">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-12 p-i">
							<div class="flexslider">
								<div class="product-img">
									<img src="{{asset('images/books/'.$singleProduct->image)}}" style="width:100%">
								</div>
							</div>
						</div>
						<div class="col-lg-9 col-md-6 col-sm-12 p-d">
							@include('front.message')
							<div class="product-info-main">
								<div class="page-title">
									<h1>{{$singleProduct->name}}</h1>
								</div>
								<div class="product-info-stock-sku">
									<div class="product-attribute">
										<span class="value">Author : {{$singleProduct->author}}</span>
										<span class="value">Language : {{$singleProduct->language}}</span>
									</div>

								</div>
								<div class="product-reviews-summary">
											
									<div class="reviews-actions">
										<div class="row">
											<div class="col-lg-7 col-md-12 col-sm-12">
												<a href="javascripti::void(0)">Published Year : {{$singleProduct->published_date}}</a>&nbsp;
												<a href="javascripti::void(0)" class="view">Total Page : {{$singleProduct->total_page}}</a>&nbsp;
												<a href="javascripti::void(0)" class="view">Under Category : {{$categoryName}}</a>
											</div>
                                            <div class="col-lg-5 col-md-12 col-sm-12">
                                                <ul class="product-star">
                                                    @for($i=1;$i<=$singleProduct->rating;$i++)
                                                        <li><i class="fa fa-star"></i></li> 
                                                    @endfor
                                                </ul>
                                            </div>
											
										</div>

									</div>
								</div>
								<div class="product-info-price">
									<div class="price-final">
										<span>
											Rs
											@if($singleProduct->free==0)
											 {{$singleProduct->price}}
											@else
												{{0}}
											@endif

										</span>
																						
									</div>
								</div>
								<div class="product-add-form">
									<div class="row">
										<div class="col-lg-3 col-md-4 col-sm-4">
											@php
												$productArr=[];
												if(Auth::check())
												{													 	$paymentProduct=App\Front\Payment::where(['user_id'=>Auth::user()->id])->get();
													
													foreach($paymentProduct as $payment)
													{
														
														$productId=explode(',',$payment->product_id);
														
														foreach($productId as $id)
														{
															array_push($productArr,$id);
														}
													}
												}
											@endphp

											@if($singleProduct->free==1 || in_array($singleProduct->id,$productArr))
												<a href="{{asset('pdf/books/'.$singleProduct->pdf)}}" class="btn btn-primary" target=_blank>Download Pdf</a>
											@else
												<form action="{{route('cart')}}" method="post" class="carts">
							                         @csrf
							                         <input type="hidden" name="product_id" value="{{$singleProduct->id}}">
	                                                 @if(Auth::check())
							                         <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
	                                                 @endif
							                         <input type="submit" name="add" value="Add to Cart">
							                    </form>
											@endif
										</div>
										<div class="col-lg-9 col-md-8 col-sm-8">
											<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ea31c5ca513151b"></script>
											<div class="addthis_inline_share_toolbox"></div>
										</div>

									</div>
			                    </div>
								<div class="product-social-links">		
									<div class="product-addto-links-text">
										<p>{{$singleProduct->description}}</p>
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
<section class="mb-70">
	<div class="new-book-area mt-60 ">
		<div class="container">
			<div class="section-title text-center mb-30">
				<h3>Related products</h3>
			</div>
			<div class="tab-active-2 owl-carousel">
                        <!-- single-product-start -->
                        @foreach($relatedProduct as $product)
        
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="{{asset('images/books/'.$product->image)}}" alt="book" class="primary" />
                                    </a>
                                    <div class="product-flag">
                                        <ul>
                                        	@if($product->free==1)
                                            <li><span class="sale">For Free</span></li>  
                                            @elseif($product->upcoming==1)
                                            <li><span class="sale">Upcoming</span></li>  
                                            @else
                                            <li><span class="sale">For Sale</span></li>  
                                            @endif  
                                        </ul>
                                    </div>
                                    
                                    <div class="quick-view">
                                        <a class="action-view" href="{{url('productDetails',['id' => Crypt::encrypt($product->id) ])}}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-details text-center">
                                    <h4><a href="#">{{$product->name}}</a></h4>
                                    <div class="product-price">
                                        <ul>
                                             @if($product->free==0)<li>RS {{$product->price}}</li>@else
                                                <li>Rs 0</li>
                                             @endif
                                        </ul>
                                    </div>
                                </div>
                               
                            </div>

                        @endforeach
                   
                        
                    </div>
	
		</div>
	</div>
</section>
@endsection