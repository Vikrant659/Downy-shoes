<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Product;
use App\Category;
use App\Cart;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function addproduct(Request $request)
    {
        
        $data = $request->all();
        $product = new Product();
        $product->category_id = $data['category_id'];
        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->type = $data['type'];
        $product->size = $data['size'];
        
        $imageName = time().'.'.$data['product_image']->getClientOriginalExtension();
        
        request()->product_image->move(public_path('productimages'),$imageName);
        
        $product->image = $imageName;
        
        
        $product->save();
        return redirect()->route('viewprod1');        
    }
    public function viewproduct( Request $request)
    
    {
        
        // $products = Product::all();
        $products = Product::where('deleted_at',NULL);
        if($request->has('search')){
            
            $name=$request->search;
            $products = $products->where('name','LIKE','%'.$name.'%');
        }
        
        $products = $products->paginate(5);
        $categories = DB::table('categories')->get();
        return view('admin.viewprod',compact('products', 'categories'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('admin.addprod', compact('categories'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.editprod', compact('product','id')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->type = $request->get('type');
        $product->size = $request->get('size');
        if($request->product_image)
        {$imageName = time().'.'.$request['product_image']->getClientOriginalExtension();
        
        request()->product_image->move(public_path('productimages'),$imageName);
        $product->image = $imageName;}
        $product->save();
        return redirect()->route('viewprod1')->with('success','Category Updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success','Product removed!!');
    }
    public function changeProduct(Request $request){
        if($request->ajax()){

            $id = $request->input('id');
            $status = $request->input('status');

            if($status == 0){
                $status = 1;
            }
            else {
                $status = 0;
            }

            $check = DB::table('products')->where('id',$id)->update(['status'=> $status]);
            if($check){
                return ['status' => true];
            } else {
                return ['status' => false];
            }

        }
    }
    
}
