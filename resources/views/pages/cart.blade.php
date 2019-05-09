@extends('layouts.full')

@section('content')
@if(Session::has('cart'))
<div class="cart_section">
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
								<span class = "inc"><td class="invert"> ${{$product ['price']}}</td></span>
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
		<!-- //top products -->
		<div class="mid_slider_w3lsagile">
			<div class="col-md-3 mid_slider_text">
				<h5>Some More Shoes</h5>
			</div>
			<div class="col-md-9 mid_slider_info">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class=""></li>
						<li data-target="#myCarousel" data-slide-to="1" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="2" class=""></li>
						<li data-target="#myCarousel" data-slide-to="3" class=""></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="item">
							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="{{ asset('frontend/images/g1.jpg') }}" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="{{ asset('frontend/images/g2.jpg') }}" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="{{ asset('frontend/images/g3.jpg') }}" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="{{ asset('frontend/images/g4.jpg') }}" alt="Image" style="max-width:100%;"></div>
								</div>
							</div>
						</div>
						<div class="item active">
							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="{{ asset('frontend/images/g5.jpg') }}" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="{{ asset('frontend/images/g6.jpg') }}" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="{{ asset('frontend/images/g2.jpg') }}" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="{{ asset('frontend/images/g1.jpg') }}" alt="Image" style="max-width:100%;"></div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="{{ asset('frontend/images/g1.jpg') }}" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="{{ asset('frontend/images/g2.jpg') }}" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="{{ asset('frontend/images/g3.jpg') }}" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="{{ asset('frontend/images/g4.jpg') }}" alt="Image" style="max-width:100%;"></div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="{{ asset('frontend/images/g1.jpg') }}" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="{{ asset('frontend/images/g2.jpg') }}" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="{{ asset('frontend/images/g3.jpg') }}" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="{{ asset('frontend/images/g4.jpg') }}" alt="Image" style="max-width:100%;"></div>
								</div>
								
							</div>
						</div>
					</div>
					<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="fa fa-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="fa fa-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
					<!-- The Modal -->

				</div>
			</div>

			<div class="clearfix"> </div>
		</div>
</div>
@else
	<div style="margin-top: 36px;"><h1><center><b>Your cart is empty!!</h1></center></b></div>
	<center><a style ="margin-top:30px; margin-bottom:30px; padding:10px;Background-color:#fb383b"href = "{{route('store')}}" class = "btn btn-primary">Go to store</a></center>
@endif
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script>
		$(document).ready(function(){
        	$(document).on('click', '.value-Minus', function(){
				var id = $(this).prop("id");
               	var url = "/reduce";               
				$.ajax({
					type: 'post',
					url: url,
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					data: {product_id: id},
					success: function(data) {
						$(".cart_section").html(data);
						$(".badge").html(parseInt($(".badge").html()-1));
					}
				});
			});

		});

</script>
<script>
		$(document).ready(function(){
        	$(document).on('click', '.delBtn', function(){
				var id = $(this).prop("id");
				var qty = $(this).attr("quantity");
               	var url = "/remove";               
				$.ajax({
					type: 'post',
					url: url,
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					data: {product_id: id},
					success: function(data) {
						$(".cart_section").html(data);
						$(".badge").html(parseInt($(".badge").html()-qty));
						swal("Item Removed!", "Item has been is removed from cart!!", "success");
						setTimeout(function () {
                            swal.close();
                        }, 1000);
					}
				});
			});

		});

</script>
<script>
		$(document).ready(function(){
        	$(document).on('click', '.value-Plus', function(){
				var id = $(this).prop("id");
               	var url = "/increment";               
				$.ajax({
					type: 'post',
					url: url,
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					data: {product_id: id},
					success: function(data) {
						$(".cart_section").html(data);
						$(".badge").html(parseInt($(".badge").html())+1);
					}
				});
			});

		});

</script>
		@endsection