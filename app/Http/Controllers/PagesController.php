<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Category;
use App\Order;
use App\Contact;
use App\Address;
use App\Review;
use DB;
Use Session;
use Auth;
use Mail;
use App\Mail\contactmail;

class PagesController extends Controller
{
    public function index()
    {
        return view ('pages.index');
    }
    public function about()
    {
        return view ('pages.about');
    }
    public function contact()
    {
        return view ('pages.contact');
    }
    // public function payment()
    // {
    //     return view ('pages.payment');
    // }
    
    public function single()
    {
        return view ('pages.single');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.edit', compact('user','id'));
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $this->validate($request,[
            'name' => ['required', 'string', 'max:15', 'min:2'],
            'email' => ['required','email']
        ]);
        $check_user_email = User::where(['email'=>$request->get('email')])->where(function($query) use($id)
        {
            if(isset($id))
            {
                $query->where('id', '<>', $id);
            }
        })->exists();
        if($check_user_email)
        {
            return redirect()->back()->with('error','Email already exist');
        }
        else
        {
            $user = User::find($id);
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->save();
            return redirect()->back()->with('success','Data Updated');
        }
        
    }
    public function prolist($id) {
        $cat = Category::where(['id'=> $id])->first();
        $products = Product::where('category_id',$cat->id)->paginate(10);
        return view('pages.shop',compact('products'));
    }
   
    // public function check(Request $request)
    // {
    //     $products = Product::all();

    //     return view('pages.checkout2.',compact('products'));
    // }
//     public function search(Request $request) 
//     {
       
//         $products = Product::all();
//         if($request->has('search')){
            
//             $name=$request->search;
//             $products = $products->where('name','LIKE','%'.$name.'%');
//         }
//         $products = $products->get();
//         $categories = DB::table('categories')->get();
//         return view('pages.shop',compact('products'));
        
//     }
    public function thanks()
    {
        return view('pages.thanks');
    }
    public function storecontact(Request $request)
    {
        $data=new Contact();
        $data->name = $request->get('Name');
        $data->email = $request->get('Email');
        $data->phone_no = $request->get('Telephone');
        $data->subject = $request->get('Subject');
        $data->message = $request->get('Message');
        $data->save();
        Mail::to('vikrantrana@gmail.com')->send(new contactmail($data));
        return redirect()->route('contactadmin');
    }
    public function editaddress($id)
    {
        $data = Address::find($id);
        return view('pages.editadd', compact('data','id'));
    }
    public function updateaddress(Request $request)
    {
        $id = $request->id;
        $this->validate($request,[
            'address1' => 'required',
            'mobile_number' => 'required|min:10|max:10',
            'landmark' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required'
        ]);
        $data = Address::find($id);
        $data->address1 = $request->get('address1');
        $data->address2 = $request->get('address2');
        $data->mobile_number = $request->get('mobile_number');
        $data->landmark = $request->get('landmark');
        $data->city = $request->get('city');
        $data->state = $request->get('state');
        $data->zip_code = $request->get('zip_code');
        $data->save();
        return redirect()->route('checkout');
    }
    public function review(Request $request,$id)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required'
        ]);
        $reviews = $request->all();
        $data = new Review();
        $data->product_id = $id;
        $data->name = Auth::user()->name;
        $data->review_title = $request->get('title');
        $data->description = $request->get('description');
        $data->save();
        return redirect()->back()->with('success','Review Updated!!');
    }
 }

