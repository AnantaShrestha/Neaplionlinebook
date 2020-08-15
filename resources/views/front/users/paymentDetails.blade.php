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
                             <h5>Billing Details</h5>

                         </div>
                         <div class="row">
                            <div class="col-lg-12">
                                <div class="table-content table-responsive mb-15 border-1">
                                    <table>
                                        <thead>
                                            <tr style="background:#D6216E;font-weight:800">
                                                <th style="color:#fff">S.No</th>
                                                <th style="color:#fff">Bill No</th>      
                                                <th style="color:#fff">Payment Hub</th>
                                                <th style="color:#fff">Charged Price</th>         
                                                <th style="color:#fff">Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1; @endphp
                                            @foreach($billingDetails as $bill)

                                            <tr>
                                                <td>{{$count++}}</td>
                                                <td>{{$bill->bill_no}}</td>
                                                <td>{{$bill->hub}}</td>
                                                <td>Rs.{{$bill->net_price}}</td>
                                                <td>Rs.{{$bill->amount}}</td>

                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                         <div class="myaccount-content">
                               <h5>Paid Book</h5>

                         </div>
                          <div class="row">
                            <div class="col-lg-12">
                                <div class="table-content table-responsive mb-15 border-1">
                                    <table>
                                        <thead>
                                            <tr style="background:#D6216E;font-weight:800">
                                                <th style="color:#fff">S.No</th>
                                                <td style="color:#fff">Book Image</td>
                                                <th style="color:#fff">Product Name</th>      
                                                <th style="color:#fff">Author</th>         
                                                <th style="color:#fff">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php 
                                                 $productArr=[];
                                                    foreach($paymentProduct as $payment)
                                                    {
                                                        
                                                        $productId=explode(',',$payment);
                                                        
                                                        foreach($productId as $id)
                                                        {
                                                            array_push($productArr,$id);
                                                        }
                                                    }

                                            @endphp
                                            @foreach($productArr as $product)
                                                @php $products=App\Admin\Product::where('id',$product)->first();$count=1; @endphp
                                                <tr>
                                                    <td>{{$count++}}</td>
                                                    <td><img src="{{asset('images/books/'.$products->image)}}" style="width:100px"></td>
                                                    <td><a href="{{url('productDetails',['id' => Crypt::encrypt($products->id) ])}}">{{$products->name}}</a></td>
                                                    <td>{{$products->author}}</td>
                                                    <td><a href="{{asset('pdf/books/'.$products->pdf)}}" class="btn btn-primary" target=_blank>Download Pdf</a></td>
                                                </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
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
</section>
@endsection
