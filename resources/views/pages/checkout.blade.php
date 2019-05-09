@extends('layouts.full')
@section('content')
<div class="ads-grid_shop">
	<div class="shop_inner_inf" >
		<div class="privacy about">
			<h3>Chec<span>kout</span></h3>			
			<div class="checkout-left">
            	<div class="col-md-4 checkout-left-basket" style="position: relative;				top:68px;">
                	<h4>Continue to basket</h4>
					<ul>
					<li><b>Product name x qty  <span>price </span></b></li>
					</ul>
                    <ul>
                        @foreach($products as $product)
                        	<li>{{$product['item']['name']}} x {{$product['qty']}}   <span>${{$product['price']}} </span></li>
                        @endforeach
						<hr>
                        <li style = "color:black"><b><h3>Total  <span>${{$total}}</span></h3></b></li>
						<hr>
					</ul>
					
					@foreach($oldAddress as $old)
						<h4>Alternate address:-</h4>
						<b>House.no:</b>{{$old->address1}}<br>
						<b>Address:</b>{{ucfirst($old->address2)}},{{ucfirst($old->landmark)}}<br>
						<b>Zip:</b>{{$old->zip_code}}
						<br>
						<b>City:</b>{{ucfirst($old->city)}}
						<br>
						<b>State:</b>{{ucfirst($old->state)}}
						<br>
						<b>Phone.no:</b>{{$old->mobile_number}}
						<br>
						<div class = "row-lg-4 row-lg-4 row-lg-4">
						<a href="{{url('payment/'.$old->id)}}" class="btn btn-primary" style = "color:white;background-color:#090909">Use Address</a>
						<span><a href="{{url('editaddress/'.$old->id)}}" class="btn btn-primary" style = "color:white;background-color:#090909">Edit Address</a>
						<a href ="{{url('deleteaddress/'.$old->id)}}" class= "btn btn-danger">Delete Address</a></span>
						<br><br>
					@endforeach
				</div>

				</div>
			</div>
			<br>
			<div class="col-md-8 address_form pull-center">
			<h3>Shipping Details</h3>
			<form action="{{url('storeaddress')}}" method="post" class="creditly-card-form agileinfo_form" >
				@csrf
				<section class="creditly-wrapper wrapper">
					<div class="information-wrapper">
						<div class="first-row form-group">
							<div class="controls {{ $errors->has('address1') ? ' is-invalid' : '' }}">
								<h4><label class="control-label">Address1: </label></h4>
								<input class="billing-address-name form-control " type="text" name="address1" placeholder="Address lane 1">
								@if ($errors->has('address1'))
									<span class="invalid-feedback" role="alert" style = "color: red">
										<strong>{{ $errors->first('address1') }}</strong>
									</span>
								@endif
							</div>
							<div class="controls ">
							<h4><label class="control-label">Address2: </label></h4>
								<input class="billing-address-name form-control" type="text" name="address2" placeholder="Address lane 2">
							</div>
							<div class="card_number_grids">
								<div class="card_number_grid_left">
									<div class="controls {{ $errors->has('mobile_number') ? ' is-invalid' : '' }}">
									<h4><label class="control-label">Mobile number:</label></h4>
										<input class="form-control" type="number" placeholder="Mobile number" name="mobile_number">
										@if ($errors->has('mobile_number'))
											<span class="invalid-feedback" role="alert" style = "color: red">
												<strong>{{ $errors->first('mobile_number') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="card_number_grid_right">
									<div class="controls">
									<h4><label class="control-label">Landmark: </label></h4>
										<input class="form-control" type="text" placeholder="Landmark" name = "landmark" >
									</div>
								</div>
							</div>
							<div class="controls {{ $errors->has('city') ? ' is-invalid' : '' }}">
							<h4><label class="control-label">Town/City: </label></h4>
							<input class="form-control" type="text" placeholder="Town/City" name = "city">
							@if ($errors->has('city'))
								<span class="invalid-feedback" role="alert" style = "color: red">
									<strong>{{ $errors->first('city') }}</strong>
								</span>
							@endif
							</div>
							<div class = "controls {{ $errors->has('state') ? ' is-invalid' : '' }}">
							<h4><label class="control-label">State: </label></h4>
							<input type="text" id="inputState" placeholder="State" class="form-control" name = "state" > 
							@if ($errors->has('state'))
								<span class="invalid-feedback" role="alert" style = "color: red">
									<strong>{{ $errors->first('state') }}</strong>
								</span>
							@endif
							</div>
							<div class= "controls {{ $errors->has('address1') ? ' is-invalid' : '' }}">
							<h4><label class="control-label {{ $errors->has('zip_code') ? ' is-invalid' : '' }}">Zip code: </label></h4>
							<input type="number" class="form-control" id="inputZip" placeholder="Zip" name = "zip_code" >
							@if ($errors->has('zip_code'))
								<span class="invalid-feedback" role="alert" style = "color: red">
									<strong>{{ $errors->first('zip_code') }}</strong>
								</span>
							@endif
							</div>
						</div>
					</div>
					<div>
						<button class = "btn btn-primary" style="background-color: #090909;border: 1px;">Make a Payment </button>
					</div>
				</section>											
            </form>
		</div>
			<div class="clearfix"></div>
			<div class="clearfix"></div>
		</div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
    $(document).ready(function () {
    $('.agileinfo_form').validate({ // initialize the plugin
        rules: { 
            address1: {
                required:true,
                maxlength: 100,
                minlength:2

			},
			address2: {
                required:true,
                maxlength: 100,
                minlength:2

            },
            mobile_number: {
				required: true,
                pattern: "[0-9]+",
                minlength:10,
                maxlength:10
			},
			landmark:{
				required: true,
				maxlength:100,
				minlength:10
			},
            city:{
                required:true,
                minlength:2,
                maxlength:50
            },
            state:{
                required:true,
                minlength:2,
                maxlength:50
            },
            zip_code:{
                required:true,
				maxlength:6,
				minlength:6
			}
		},
        messages:{
           address1:{
				required:"Address is required",
				maxlength:"You can fill maximum of 100 chracters",
				minlength:"Minimum 2 chracters are required"
			},
			address2:{
				required:"Address is required",
				maxlength:"You can fill maximum of 100 chracters"
            },
            mobile_number:{
                required:"Mobile number is required",
                pattern:"please input valid mobile number",
                minlength:"minimum 10 digit number required",
				maxlength:"You can enter maximum of 10 digits only"
			},
			landmark:{
				required:"Landmark field is rerquired"
			},
            city:{    
                required:"City field can not be blank"
            },
            state:{
                required:"State field can not be blank!",
            },
            zip_code:{
				required:"Zip code field can not be blank!",
				minlength:"minimum 6 digit number required",
				maxlength:"maximum 6 digit number required"
            }
		}
	
    });
});
</script>

@endsection