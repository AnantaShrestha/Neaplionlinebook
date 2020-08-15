@foreach($productlist as $product)
	<div class="tab-total {{ (request()->is('/')) ? 'col-lg-2 col-md-2 col-sm-6 col-xs-6' : 'col-lg-3 col-md-3 col-sm-6 col-xs-6' }}">
	    <div class="product-wrapper mb-40">
			<div class="product-img">
				<a href="{{url('productDetails',['id' => Crypt::encrypt($product->id) ])}}">
					<img src="{{asset('images/books/'.$product->image)}}" class="primary" />
				</a>
				<div class="product-flag">
					<ul>
							                             
					@if($product->free==1)
						<li><span class="sale">For Free</span></li> 
					@elseif($product->upcoming==1)  
						<li><span class="sale">Upcoming</span></li> 
					@else
						<li><span class="sale">For Sale</span> </li> 
					@endif
					</ul>
				</div>
			</div>
						                                  
			<div class="quick-view">
                <a class="action-view" href="{{url('productDetails',['id' => Crypt::encrypt($product->id) ])}}">
                    <i class="fa fa-eye"></i>
                </a>
            </div>
			<div class="product-details text-center">
						                                        
				<h4><a href="{{url('productDetails',['id' => Crypt::encrypt($product->id) ])}}" style="font-size:14px">{{$product->name}}</a></h4>
				<div class="product-price">
					<ul>
						<li>Rs @if($product->free==0){{$product->price}}@else {{0}} @endif</li>                                            
					</ul>
				</div>
			</div>
	                                   
	    </div>
	</div>
@endforeach
{{ $productlist->render() }}
	    		