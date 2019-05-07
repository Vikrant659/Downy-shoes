@extends('layouts.full')

@section('content')

			<!-- //product left -->
			<!-- product right -->
<div class="left-ads-display col-md-9" style="margin: 70px 0px 85px 172px;position: inherit;">
	<div class="wrapper_top_shop">
		<div class="col-md-6 shop_left">
			<img src="{{ asset('frontend/images/banner3.jpg') }}" alt="">
			<h6>40% off</h6>
		</div>
		<div class="col-md-6 shop_right">
			<img src="{{ asset('frontend/images/banner2.jpg') }}" alt="">
			<h6>50% off</h6>
		</div>
		<div class="clearfix"></div>

					<!-- product-sec1 -->
		@foreach($products as $product)
					
			<div class="product-sec1">
						<!--/mens-->
						<div class="col-md-4 product-men">
							<div class="product-shoe-info shoe" style="position: relative; top: 19px">
								<div class="men-pro-item">
									<div class="men-thumb-item">
										<img src="{{ asset('productimages/'.$product->image) }}" style= "width:275px; height: 250px; padding-right:22px; ">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="{{url('/single/'.$product->id)}}" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
									</div>
									<div class="item-info-product">
										<h4>
											<a href="/single">{{$product->name}}</a>
										</h4>
										<div class="info-product-price">
											<div class="grid_meta">
												<div class="product_price">
													<div class="grid-price ">
														<span class="money ">${{$product->price}}</span>
													</div>
												</div>
	
											</div>
											<div class="shoe single-item hvr-outline-out">
											<a href="javascript:void(0);" id="{{$product->id}}" class="btn btn-primary submitBtn" role="button" style = "position: absolute; left: 155px; bottom: 1px">Add to Cart</a>
												

											</div>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
                        </div>
                        </div>
						@endforeach	
		</div>
        <div class="clearfix"> </div>
		</div>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script>
		$(document).ready(function(){
        	$('.submitBtn').click(function(){
				var id = $(this).prop("id");
               	var url = "/addtocart";               
				$.ajax({
					type: 'post',
					url: url,
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					data: {product_id: id},
					success: function(data) {
						let oldcount = parseInt($(".badge").html());
						if(oldcount < 1 || isNaN(oldcount)){
							$(".badge").html(1);
						} else {
							$(".badge").html(oldcount + 1);
						}
						
						swal("Ordered Successful!", "You item is added to cart!!", "success");
						setTimeout(function () {
                            swal.close();
                        }, 1000);
					}
				});
			});
		});

</script>

@endsection