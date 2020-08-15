@extends('front.layouts.default')
@section('head')
<title>Cart -Nepali Online Book</title>
@endsection
@section('content')
<div class="breadcrumbs-area mb-30">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumbs-menu">
					<ul>
						<li><a href="{{route('/')}}">Home</a></li>
						<li><a href="{{route('cart')}}" class="active">My Cart</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	@include('front.message')
</div>
<div class="cart-main-area mt-70 mb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
					<div class="table-content table-responsive mb-15 border-1">
						<table>
							<thead>
								<tr>
									<th>Image</th>
									<th>Book Name</th>		
									<th>Author</th>			
									<th>Price</th>
                                    <th>Total Page</th>
                  					<th>Language</th>
									<th>Remove</th>
								</tr>
							</thead>
							<tbody>
                                <?php $total_amount=0;?>
                                @foreach($carts as $cart)
								<tr>
									<td class="product-thumbnail"><a href="{{url('productDetails',['id' => Crypt::encrypt($cart->product_id) ])}}"><img src="{{asset('images/books/'.$cart->cartProduct->image)}}" alt="man" style="height:80px"></a></td>
									<td class="product-name"><a href="{{url('productDetails',['id' => Crypt::encrypt($cart->product_id) ])}}">{{$cart->cartProduct->name}}</a></td>
									<td>{{$cart->cartProduct->author}}</td>
									<td class="product-price"><span class="amount">Rs {{$cart->cartProduct->price}}</span></td>
									<td>{{$cart->cartProduct->total_page}}</td>
									<td>{{$cart->cartProduct->language}}</td>
									<td class="product-remove"><a href="{{url('deleteCart',['id' => Crypt::encrypt($cart->id) ])}}"><i class="fa fa-times"></i></a></td>
								</tr>
                                <?php $total_amount=$total_amount + $cart->cartProduct->price ; ?>
                                @endforeach
										
							</tbody>
						</table>
					</div>
			</div>
		</div>
		<div class="row">
            <div class="col-lg-8 col-md-6 col-12">
                        <div class="buttons-cart mb-30">
                            <ul>
                                <li><a href="{{route('allBook')}}">Continue Shopping</a></li>
                            </ul>
                        </div>
                       
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="cart_totals">
                    <h2>Cart Totals</h2>
                    <table>
                                <tbody>
                                    
                                   <br>
                                    <tr class="order-total">
                                        <th>Total Amount</th>
                                        <td>
                                            <strong>
                                                <span class="amount">Rs&nbsp;<?php echo $total_amount; ?></span>
                                            </strong>
                                        </td>
                                    </tr>
                                </tbody>
                    </table>
                    <div class="wc-proceed-to-checkout">
                        <a href="{{route('checkout')}}">Proceed to Checkout</a>
                    </div>
                 </div>
            </div>
        </div>
	</div>
</div>


@endsection