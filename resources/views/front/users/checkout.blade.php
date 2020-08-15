@extends('front.layouts.default')
@section("head")
<title>Checkout - Nepalionlinebook</title>
	<style type="text/css">
		.paymenthub button
		{
			width:100%;
			text-align:left;
		}
	</style>
@endsection
@section('content')

<div class="breadcrumbs-area mb-70">
	<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcrumbs-menu">
							<ul>
								<li><a href="{{route('cart')}}">Cart</a></li>
								<li><a href="{{route('checkout')}}" class="active">Checkout</a></li>
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
                        <h5 style="text-align:center">Checkout Details</h5>
                        <div class="row">
                             <div class="col-lg-12 col-md-12">
                                <div class="tab-content" id="myaccountContent">
                                            <!-- Single Tab Content Start -->
                                    <div  id="dashboad">
                                        <div class="myaccount-content">
                                            <h5>Personal Details</h5>
                                            <table>
                                                <tbody>
                                                   			<tr>
                                                   				<td id="user-info" class="head">Name</td>
                                                   				<td id="user-info" class="sub_head">{{Auth::user()->name}}</td>
                                                   			</tr>
                                                   			<tr>
                                                   				<td id="user-info" class="head">Email Address</td>
                                                   				<td id="user-info" class="sub_head">{{Auth::user()->email}}</td>
                                                   			</tr>
                                                   			<tr>
                                                   				<td id="user-info" class="head">Phone Number</td>
                                                   				<td id="user-info" class="sub_head">{{Auth::user()->phone_no}}</td>
                                                   			</tr>
                                                   			<tr>
                                                   				<td id="user-info" class="head">Address</td>
                                                   				<td id="user-info" class="sub_head">{{Auth::user()->address}}</td>
                                                   			</tr>
                                                </tbody>
                                            </table>
                                                   
                                        </div>
										
                                        <div class="myaccount-content">
                                            <h5>Cart Details</h5><br>
											
                                            <!-- <form method="POST" action="#"> -->
                                                    	@csrf
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
																		
																	</tr>
																					
																</thead>
																<tbody>
																   <?php 
																   		   $total_amount=0;
																		   $product_name = '';
																		   $product_image_url;
																   ?>
																   
											                        @foreach($carts as $cart)
																	<tr>
																				<td class="product-thumbnail"><a href="{{url('productDetails',['id' => Crypt::encrypt($cart->product_id) ])}}"><img src="{{asset('images/books/'.$cart->cartProduct->image)}}" alt="man" style="height:80px"></a></td>
																				<td class="product-name"><a href="{{url('productDetails',['id' => Crypt::encrypt($cart->product_id) ])}}">{{$cart->cartProduct->name}}</a></td>
																				<td>{{$cart->cartProduct->author}}</td>
																				<td class="product-price"><span class="amount">Rs {{$cart->cartProduct->price}}</span></td>
																				<td>{{$cart->cartProduct->total_page}}</td>
																				<td>{{$cart->cartProduct->language}}</td>
																				
																	</tr>
																	  <?php 
																	  	  $total_amount=$total_amount + $cart->cartProduct->price ;
																		  $product_name = $product_name.$cart->cartProduct->name.'/';
																		  $product_image_url= asset('images/books/'.$cart->cartProduct->image);
																	  ?>
											                        @endforeach
											                        <tr>
																		<td colspan='5'>Total Amount</td>
																		<td> Rs {{$total_amount}}</td>
																	</tr>
																					
																</tbody>
															</table>
															<div class="place-order-button" style="text-align:center;margin-bottom:50px">

															<!-- Button trigger modal -->
															<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
																Proceed Payment
															</button>
															
															<input type="hidden" name="total" value="{{$total_amount}}">

															</div>
															
															<!-- Modal -->
															<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
															<div class="modal-dialog modal-dialog-centered" role="document">
																<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLongTitle">Select Payment Hub</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body paymenthub">
															
																	<!-- PAY WITH CellPay -->
																	<button id="prabhupay-payment-button" onclick="prabhuPayHandler()" class="btn btn-primary"><img src="{{asset('front/prabhu.png')}}" style="width:50px">&nbsp;&nbsp;pay with PrabhuPay</button>
																	<hr>
																	<!-- KHALTI -->
																	<button id="payment-button-khalti" onclick="khaltiHandler()" class="btn btn-primary"><img src="{{asset('front/khalti.jpg')}}" style="width:50px">&nbsp;&nbsp;Pay with Khalti</button>
																	<hr>
																	<!-- PAY WITH ESEWA -->
																	<button id="payment-button-esewa" onclick="esewaHandler()" class="btn btn-primary"><img src="{{asset('front/esewa.png')}}" style="width:50px">&nbsp;&nbsp;Pay with Esewa</button>
																	<hr>
																	<!-- PAY WITH CellPay -->
																	<button id="cellpay-payment-button" onclick="cellPayHandler()" class="btn btn-primary"><img src="{{asset('front/cellpay.png')}}" style="width:50px">&nbsp;&nbsp;pay with CellPay</button>
																	
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																</div>
																</div>
															</div>
															</div>
														</div>
													</div>
												</div>
											<!-- </form> -->
                                                   
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
</div>
@endsection
@section('script')
<script type="text/javascript">

	/**
	* @name esewaManager
	* @description
	* - It returns path and configuration 
	* - references:- https://developer.esewa.com.np/#/epay?id=integration
	*/
	function esewaManager(){
		let path="{{ config('services.esewa.esewa_endpoint').'/epay/main' }}";
		let params= {
			amt: {{ $total_amount }}, // Amount of product or item or ticket etc
			psc: 0, //Service charge by merchant on product or item or ticket etc
			pdc: 0, //Delivery charge by merchant on product or item or ticket etc
			txAmt: 0, //Tax amount on product or item or ticket etc
			tAmt: {{ $total_amount }}, //Total payment amount including tax, service and deliver charge. [i.e tAmt = amt + txAmt + psc + tAmt]
			pid: "<?php echo auth()->user()->id ?>",//A unique ID of product or item or ticket etc 
			scd: "{{ config('services.esewa.merchant_code') }}", //Merchant code provided by eSewa
			su: "{{ url('/payment_success?hub=esewa') }}", //Success URL: a redirect URL of merchant application where customer will be redirected after SUCCESSFUL transaction
			fu: "{{ url('/payment_failure?hub=esewa') }}" //Failure URL: a redirect URL of merchant application where customer will be redirected after FAILURE or PENDING transaction
		}

		return {
			path,
			params
		}
	} 

	/**
	* esewa test credinetials ::
	* -------------------------
	* username: 9806800005
	* password: test@123
	* FORM ESEWA DOCS ::
	* ----------------
	* eSewa ID: test1/test2/test3/test4/test5@esewa.com.np
    * Password: test12
	*/
	
	/**
	* @name cellPayManager
	* @description
	* - It returns path and cellPay configuration
	* - references:- https://drive.google.com/file/d/1ndHiIqVKThiOV0k0BcUbiGM1IUGEwcQI/view?usp=sharing
	*/
	function cellPayManager(){
		let path = "{{ config('services.cellpay.merchant_api') }}";
		let params= {
			merchant_id: "{{ config('services.cellpay.merchant_id') }}", //merchant id 
			description: "{{ $product_name }}", //product name
			amount: {{ $total_amount }},
			invoice_number: "<?php echo auth()->user()->id ?>",
			success_callback: "{{ url('/payment_success?hub=cellpay') }}",
			failure_callback: "{{ url('/payment_failure?hub=cellpay') }}",
			cancel_callback: "{{ url('/payment_cancellation?hub=cellpay') }}"
		}

		return {
			path, 
			params
		}
		
	} 

//tetst credinetials
// username: 9841000001

// password: 111111
	/**
	* @name khaltiManager
	* @description
	* - It returns  handle khalti method where khalti checkout and configuraiton is carried out. 
	* - references: https://docs.khalti.com/checkout/web/
	*/
	function khaltiManager(){
		let config = {
			"publicKey": " {{ config('services.khalti.public_key') }} ",//required, Test or live public key which identifies the merchant.
			"productIdentity": "<?php echo auth()->user()->id ?>", //required, Unique product identifier at merchant.
			"productName": "{{ $product_name }}", //required, Name of product.
			"productUrl":"{{ $product_image_url }}", //required, Url of product.
			"paymentPreference": [
				"MOBILE_BANKING",
				"KHALTI",
				"EBANKING",
				"CONNECT_IPS",
				"SCT",
				],
			"eventHandler": {
				onSuccess (payload) {
					let path="{{ url('/payment_success?hub=khalti') }}"+"&token="+payload.token+"&amount="+payload.amount;
					window.location.href = path;
				},
				onError (error) {
					let path="{{ url('/payment_failure?hub=khalti') }}"+"&error="+JSON.stringify(error);
					window.location.href = path;
				},
				onClose () {
				}
			}, //required, It is a javascript object with three methods
		};

		let checkout = new KhaltiCheckout(config);
		
		function handleKhalti(object){
			checkout.show(object);
		}

		return {
			handleKhalti,
		}
	} 

	/**
	 * @name prabhupayManager
	 * @description
	 * - it config and path
	 */
	function prabhupayManager(){
		path = 'https://testsys.prabhupay.com/api/Epayment/GetOtp';
		config = {
			"amount": {{ $total_amount }}, 
			"invoiceNo": "<?php echo auth()->user()->id ?>", //Unique Value
			"txnDate": "{{ date('Y-m-d') }}", //YYYY-MM-DD
			"merchantId": "nepalionlinebook", //Shall be provided
			"cellPhone": "9803251085", //PrabhuPAY MobileNumber
			"password": "bp4psz0v", // shall be provided
		};
		// console.log(path, config);
		
		function handlePrabhupay(){
			var request = $.ajax({
				url: path,
				method: "POST",
				data: config,
				dataType: 'json'
			});
			
			request.done(function( response ) {
				console.log('handler prabhu pay response otp::',response);
			});
			
			request.fail(function( jqXHR, textStatus ) {
				console.log('jqXHR::', jqXHR, 'text status ::', textStatus);
			});
		};

		return {
			handlePrabhupay
		}

	}

	
	const kh = khaltiManager();
	const em = esewaManager();
	const cp = cellPayManager();
	const pm = prabhupayManager();


	/**
	* @name esewaHandler
	* @description
	* - it is click events of pay with esewa button
	*/
	function esewaHandler(){
		post(em.path, em.params);
	
	}
	
	/**
	* @name khaltiHandler
	* @description
	* - it is click events of pay with khalti button
	*/
	function khaltiHandler(){
		kh.handleKhalti({
			amount : {{ $total_amount }} * 100
		});
	}

	/**
	* @name cellPayHandler
	* @description
	* - it is click events of pay with cellpay button
	*/
	function cellPayHandler(){
		post(cp.path, cp.params);
	}

	/**
	* @name prabhuPayHandler
	* @description
	* - it is click events of pay with prabhupay button
	*/
	function prabhuPayHandler(){
		pm.handlePrabhupay();
	}

	/**
	* @name post
	* @description
	* - it creat the form object with the paramter provide and value and the submmit to the given path post request.
	*/
	function post(path, params) {
		let form = document.createElement("form");
		form.setAttribute("method", "POST");
		form.setAttribute("action", path);

		for(let key in params) {
			let hiddenField = document.createElement("input");
			hiddenField.setAttribute("type", "hidden");
			hiddenField.setAttribute("name", key);
			hiddenField.setAttribute("value", params[key]);
			form.appendChild(hiddenField);
		}
		document.body.appendChild(form);
		form.submit();
	}

	
</script>
@endsection