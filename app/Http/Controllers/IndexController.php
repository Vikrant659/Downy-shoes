<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Category;
use App\Address;
use App\Order;
use App\OrderDetail;
use DB;
use Session;
use Stripe\Stripe;
use Stripe\Charge;
use Auth;
use Mail;
use App\Mail\confirmmail;
use Mpdf\Mpdf;
class IndexController extends Controller
{
    // To show product listing to Customer
    public function show(Request $request)
    {
   // $products = Product::all();
    $categories = Category::where('status',1)->pluck('id')->toArray();//To pluck the id of those product whose status is 1(active)
   
    $name=$request->get('Search','');
    
    $condition = $name!='' ? [['name','LIKE','%'.$name.'%']] : [];
    
    $products = Product::whereIn('category_id',$categories)->where($condition)->where('status', 1)->get();
    if(count($products) <= 0) //if count of products are 0 then
    {
        return view('pages.noproduct'); //this view will be showed
    }
     return view('pages.shop',compact('products'));

    }

    // To show description page of each product
    public function single($id)
    {
     $products = Product::find($id);
     return view('pages.single',compact('products'));
    }

    //Add item to cart 
    public function addtocart(Request $request)
    {
        $input = $request->all();
        
        $product = Product::find($input['product_id']);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id); //Calling add function from cart class
        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        return ['status' => 'success'];
    }
    //Add item 
    public function addbyone(Request $request)
    {
        $input = $request->all();
        
                $oldCart = Session::has('cart') ? Session::get('cart') : null;
                $cart = new Cart($oldCart);
                $cart->addByOne($input['product_id']);
        
                Session::put('cart', $cart);
                return view('pages.minicart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]); 
        //  dd($cart);
        return view('pages.minicart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
    
    public function getcart() {
            if (!Session::has('cart')) {
                return view('pages.cart');
            }
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            //  dd($cart);
            return view('pages.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
        }
        public function reducebyone(Request $request) {
            $input = $request->all();
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->reduceByOne($input['product_id']);
            if (count($cart->items) > 0) {
                Session::put('cart', $cart);
            } else {
                Session::forget('cart');
            }
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            //  dd($cart);
            return view('pages.minicart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
        }
        public function removeitem(Request $request) {
            $input = $request->all();
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->removeItem($input['product_id']);
            if (count($cart->items) > 0) {
                Session::put('cart', $cart);
            } else {
                Session::forget('cart');
            }
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            //  dd($cart);
            return view('pages.minicart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
        }
        public function getcheck(Request $request ,$id)
        {
            if (!Session::has('cart')) {
                return view('pages.cart');
            }
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $total = $cart->totalPrice;
            $oldAddress = Address::where('user_id',Auth::User()->id)->where('id',$id)->first();
            return view('pages.payment', ['products' => $cart->items,'total' => $total],compact('oldAddress'));
            
        }
        public function check()
        {
            $oldAddress= Address::where('user_id',Auth::User()->id)->orderBy('created_at','desc')->take(2)->get();
            if (!Session::has('cart')) {
                return view('pages.cart');
            }
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $total = $cart->totalPrice;
            return view('pages.checkout',compact('oldAddress'),['products' => $cart->items,'total' => $total,'oldAddress' => $oldAddress]);
        }
        public function postcheck(Request $request){
            //dd($token);
          if (!Session::has('cart')) {
                return redirect()->route('cart');
            }
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            // dd($cart);
    Stripe::setApiKey('sk_test_lGdFpP1A7tyU674Ft6iCNcYO00KDSL4gqQ');
                try {
                $charge = Charge::create(array(
                    "amount" => $cart->totalPrice * 100,
                    "currency" => "usd",
                    "source" => $request->input('stripeToken'), // obtained with Stripe.js
                    "description" => "Test Charge"
                ));

                $order = new Order();
                $order->user_id = Auth::User()->id;
                $order->total_products = $cart->totalQty;
                $cart->totalPrice = $charge->amount/100;
                $order->total_price = $cart->totalPrice;
                $order->payment_id = $charge->id;
                $order->cart = serialize($cart);
                $order->save();

                $s = Order::where('id',$order->id)->first();
              
            foreach ($cart->items as $thing) {
                $data=new OrderDetail();
                $data->order_id = $s->id;
                $data->user_id = Auth::User()->id;
                $data->product_id = $thing['item']['id'];
                $data->quantity = $thing['qty'];
                $data->price = $thing['price'];
                $data->save();
            }

            } catch (\Exception $e) {
                return redirect()->route('payment')->with('error', $e->getMessage());
            }
            $user = Auth::user();
            // Mail::from('Downyshoes@example.com', 'Downy Shoes')>send(new confirmmail($cart));
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML(\View::make('pages.invoice',compact('cart')));
            $pdf_path = public_path() . '/invoiceuser/' . $order->id . '.pdf';
            $mpdf->Output($pdf_path, 'F');
            Mail::to($user->email)->send(new confirmmail($cart,$pdf_path));

            Mail::to('vikrantrana@gmail.com')->send(new confirmmail($cart,$pdf_path));
            Session::forget('cart');
            $order = Order::where('user_id',Auth::User()->id)->where('id',$order->id)->first();
            $cart = unserialize($order->cart);
           //dd($cart)
            return view('pages.thanks')->with(compact('order','cart'));
        }
        public function storeaddress(Request $request)
        { 
            $this->validate($request,[
                'address1' => 'required',
                'mobile_number' => 'required|min:10|max:10',
                'landmark' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zip_code' => 'required'
            ]);
            
            $data = new Address();
            $data->user_id = Auth::User()->id;
            $data->address1 = $request->input('address1');
            $data->address2 = $request->input('address2');
            $data->mobile_number = $request->input('mobile_number');
            $data->landmark = $request->input('landmark');
            $data->city = $request->input('city');
            $data->state = $request->input('state');
            $data->zip_code = $request->input('zip_code');
            $data->save();
            $oldAddress= Address::where('user_id',Auth::User()->id)->orderBy('created_at','desc')->first();
            return redirect('/payment/'.$oldAddress['id']);
        }
        
}
