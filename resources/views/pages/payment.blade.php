@extends('layouts.full')

@section('content')


	<div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''  }}">
	{{ Session::get('error') }}
	</div>

	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<div class="privacy about">
				<b><center><h2 style=";margin-left: 132px;">Paym<span>ent</span></h2></center></b>
					<div class="responsive_tabs">
						<div id="horizontalTab">
							<div class="checkout-left">
								<div class="col-md-4 checkout-left-basket">
								<h4>Continue to basket</h4>
								<ul>
								<li><b>Product name x qty  <span>price </span></b></li>
								</ul>
								<ul>
									@foreach($products as $product)
									<li>{{$product['item']['name']}} x {{$product['qty']}}   <span>${{$product['price']}} </span></li>
									@endforeach
									<hr>
									<li style = "color:black"><b><h5>Total  <span>${{$total}}</span></h5></b></li>
									<hr>
								</ul>
									<h4>Delivering To:-</h4>
									<b>House.no:</b>{{$oldAddress->address1}}<br>
									<b>Address:</b>{{ucfirst($oldAddress->address2)}},{{ucfirst($oldAddress->landmark)}}<br>
									<b>Zip:</b>{{$oldAddress->zip_code}}
									<br>
									<b>State:</b>{{ucfirst($oldAddress->state)}}
									<br>
									<b>Phone.no:</b>{{$oldAddress->mobile_number}}
									<br><br>
									<a href="{{url('checkout')}}" class="btn btn-primary" style = "color:white;background-color:#090909">Change Address</a> <br>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 pull-right" style="display: block;box-sizing: border-box;padding: 12px;border: 1px solid #D3D3D3;box-shadow:3px 4px 13px 1px">
						<form action="{{route('payment')}}" method="post" id="payment-form" style="position: relative; ">
						@csrf
						<div>
					 		<label for="card-element" >
								Credit or debit card
					  		</label>
							<div id="card-element" >
							  <!-- A Stripe Element will be inserted here. -->
						  	</div>
				  
								 <!-- Used to display form errors. -->
						  	<div id="card-errors" role="alert">
						  	</div>
						   	<br>
				  
				   			<input type="submit" class="btn submit" value="Submit Payment" id="trigger" style="background-color:#090909;color: white; ">
							
						   </div>
					</div>
						<div id="preload" style="display: none;"><img src="/productimages/tenor.gif" width = "200px" height = "200px"></div>
					
						
					<script src="https://js.stripe.com/v2/"></script>
					<script src="https://js.stripe.com/v3/"></script>
					<script src="{{ asset('js/checkout.js') }}" ></script>
					<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
@endsection
