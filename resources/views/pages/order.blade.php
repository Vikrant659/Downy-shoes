
@extends('layouts.full')

@section('content')
@if($orders->count())

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <br>
            <h2>My Orders</h2>
            <br>
            @foreach($orders as $order)

            <div class="panel panel-default">
            <div class="panel-body">
            <ul class="list-group">
            @foreach($order->cart->items as $item)

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
            <strong>Total Price: ${{ $order->cart->totalPrice }}</strong>
         
            </div>
            </div>
            @endforeach
            <span style = "color: #767676;">
            {{ $orders->links() }}
            </span>
        </div>
    </div>


@else

<br><br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <br>
            <h2>You have not ordered anything yet
            <a href="{{url('shop')}}" class ="btn btn-primary" type="button" style="float: right;color:white;background-color:#fb383b" >SHOP NOW</a></h2>
            <br>
            <br>
        </div>
    </div>
s<br><br>
@endif
@endsection
