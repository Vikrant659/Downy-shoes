<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Cart;
use DB;
use Session;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // To add Category from admin side

    public function addcategory(Request $request)
    {
        // $this->validate($request,[
        //     'category' => 'required',
        //     'description'=>'required'
        // ]);
        if($request->isMethod('POST')) {
            $data = $request->all();
            $category = new Category();
            $category->category = $data['category_name'];
            $category->description = $data['category_description'];
            $category->save();
            
        }
        return view('admin.addcat');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // View list of categories to admin  
    public function viewcategory(Request $request)
    
    {

        $categories = Category::where('deleted_at', NULL);
        // dd($categories);
        if($request->has('search')){
            $name=$request->search;
            $categories = $categories->where('category','LIKE','%'.$name.'%');
        }
        $categories = $categories->paginate(5);                
        return view('admin.viewcat',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // To edit category name,price etc..
    public function editcategory(Request $request,$id)
    {
        $category = Category::find($id);
        return view('admin.editcat', compact('category','id')); 
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

        // To update the edited category
    public function update(Request $request, $id)
    {
    
            //    $this->validate($request,[
            //         'category' => 'required',
            //         'description' => 'required'
    
            //    ]);
    
            $category = Category::find($id);
            $category->category = $request->get('category_name');
            $category->description = $request->get('category_description');
            $category->save();
    
    
            return redirect()->back()->with('success','Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // To delete a specific category
     
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success','Category removed');
    }

    // To deactivate a specific category

    public function changeCategory(Request $request){
        if($request->ajax()){

            $id = $request->input('id');
            $status = $request->input('status');

            if($status == 0){
                $status = 1;
            }
            else {
                $status = 0;
            }

            $check = DB::table('categories')->where('id',$id)->update(['status'=> $status]);
            if($check){
                return ['status' => true];
            } else {
                return ['status' => false];
            }

        }
    } 
}
