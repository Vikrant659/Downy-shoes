@if(Session::has('cart'))
<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<div class="privacy about">
				<h3>Ca<span>rt</span></h3>

				<div class="checkout-right">
					<table class="timetable_sub">
						<thead>
							<tr>
							
								<th>Product</th>
								<th>Quantity</th>
								<th>Product Name</th>
								<th>Price/Unit</th>
								<th>Price</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
						@foreach($products as $product)
							<tr class="rem1" id="product_row_{{$product['item']['id']}}">
							
					
								<td class="invert-image"><a href="#" ><img src="{{ asset('productimages/'.$product['item']['image']) }}" alt=" " class="img-responsive" style = "width:100px; height:100px"></a></td>
								<td class = "invert">
								<div class="quantity">
									<div class="quantity-select">
										<a href = "javascript:void(0);" id = "{{$product['item']['id']}}" class=" value-Minus"><div class="entry value-minus">&nbsp;</div></a>
										<div class="entry value"><span>{{$product['qty']}}</span></div>
										<a href = "javascript:void(0);" id = "{{$product['item']['id']}}" class="value-Plus"><div class = "entry value-plus">&nbsp;</div></a>
										</div>
									</div>	
								</td>
								<td class="invert">{{$product ['item']['name']}}</td>
								<td class="invert">${{$product ['item']['price']}}</td>
								<td class="invert">${{$product ['price']}}</td>
								<td class="invert">
									<div class="rem">
										<div><a href="javascript:void(0);" id="{{$product['item']['id']}}" quantity = "{{$product['qty']}}" class = "delBtn"><i class="fa fa-trash" style="font-size:24px"></i></a></div>
									</div>
								</td>
							</tr>
							@endforeach
							</tbody>
					</table>
					</div>
					<hr>
					
					<h3><strong>Total:</strong>${{$totalPrice}}</h3>
				
					<div class="checkout-right-basket">
										<a href="{{route('checkout')}}">Proceed to checkout >> </a>
									</div>
			<div class="clearfix"> </div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
@else
	<div style="margin-top: 36px;"><h1><center><b>Your cart is empty!!</h1></center></b></div>
	<center><a style ="margin-top:30px; margin-bottom:30px; padding:10px;Background-color:#fb383b"href = "{{route('store')}}" class = "btn btn-primary">Go to store</a></center>
@endif