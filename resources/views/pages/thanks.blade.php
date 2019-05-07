
@extends('layouts.full')
@section('content')
<center>
<div class="jumbotron text-xs-center">
  <h1 class="display-3">Thank You for buying from us.</h1>
  <p class="lead"><strong>Please check your email for the invoice.</strong>  
Your order will be delivered to you very soon.</p>
  
  <p>
    Having trouble? <a href="{{url('contact')}}">Contact us</a>
  </p>
  <p class="lead">
  <a style ="margin-top:30px; margin-bottom:30px; padding:10px;background-color:#fb383b; color:white"href = "{{route('store')}}" class = "btn btn-primary">Go to store</a>
  </p>


  <h3>Order Summary</h3>  </center>
  <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <br>
            <h2>Product purchased successfully!!!</h2>
            <br>
          

            <div class="panel panel-default">
            <div class="panel-body">
            <ul class="list-group">
            @foreach($cart->items as $item)

            <li class="list-group-item">
            <span class="badge">${{ $item['price'] }}</span>
            {{ $item['item']['name'] }} | {{ $item['qty'] }} Units
            </li>
            <!-- <li class="list-group-item">
                <img src="{{asset('productimages/'.$item['item']['image'])}}" width="150px">
            </li> -->
            @endforeach
            </ul>
            <ul class="list-group">


            <li class="list-group-item">
            <span class="badge">{{ $order->created_at }}</span>
            Ordered At
            </li>
            <li class="list-group-item">
            <span class="badge">{{  $order->payment_id }}</span>
            Payment Id
            </li>

            </ul>

            </div>
            <div class="panel-footer">
            <strong>Total Price: ${{ $cart->totalPrice }}</strong>
         
            </div>
            </div>
          
            <span style = "color: #767676;">
          
            </span>
        </div>
    </div>

</div>

@endsection