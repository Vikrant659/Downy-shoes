<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Cart;
use App\Category;
use App\Order;
use App\OrderDetail;
use DB;
Use Session;
use Auth;

class OrderController extends Controller
{
    public function getOrder() {
    //     $orders = OrderDetail::where(['user_id'=>$id])->paginate(4);
    // //  dd($orders);
    //     $new = count($orders);
    //     if(empty($new))
    //     {
    //         return view('pages.noorder');
    //     }
        $orders = Auth::User()->orders()->orderBy('id','desc')->paginate(5);
        
        // $orders = Order::paginate(5);
        // dd($orders);
        
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('pages.order',compact('orders'));
       
    }
    public function showorder()
    {
        $orders = Order::orderBy('created_at','desc')->paginate(10);
        //$orders = $orders->paginate(10);  
        return view('admin.vieworder',compact('orders'));
    }
    public function getorderdetail($id)
    {
     
        $data = OrderDetail::orderBy('created_at','desc')->where(['order_id'=> $id])->get();
        return view('admin.orderdetail',compact('data'));
    }
   
}
