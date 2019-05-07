<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
 Route::get('invoice', function () {
return view('pages.invoice');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','PagesController@index');
Route::get('/about','PagesController@about');
Route::get('/shop','IndexController@show')->name('store');
Route::any('/contact','PagesController@contact')->name('contactadmin');
Route::get('/list/{id}','PagesController@prolist')->name('prolist');
// Route::get('/search','PagesController@search')->name('search');
Route::patch('/update', 'PagesController@update')->name('update1');
Route::any('/addtocart','IndexController@addtocart')->name('addtocart');
Route::get('/cart','IndexController@getcart')->name('cart');
Route::get('/order/{id}','OrderController@getOrder');
Route::get('/thank','PagesController@thanks')->name('thankyou');
Route::any('/remove','IndexController@removeitem')->name('removeitem');
Route::any('/reduce','IndexController@reducebyone')->name('reducebyone');
Route::any('/increment','IndexController@addbyone')->name('addbyone');
Route::get('/single/{id}','IndexController@single');
Route::post('/contacthimnow','PagesController@storecontact')->name('contacthim');
Route::group(['middleware'=>'auth'],function()
{
Route::patch('/updateaddress','PagesController@updateaddress')->name('updateadd');
Route::get('/editaddress/{id}', 'PagesController@editaddress')->name('editadd');
Route::get('/payment/{id}','IndexController@getcheck')->name('payment');
Route::post('/payment','IndexController@postcheck')->name('payment');
Route::get('/checkout','IndexController@check')->name('checkout')->middleware('verified');
Route::post('/storeaddress','IndexController@storeaddress');
Route::get('/edit/{id}', 'PagesController@edit')->name('edit');
});
// ---------------Admin page routes-------------------
Route::match(['GET','POST'],'/admin','AdminController@signin');
Route::prefix('admin')->middleware(function($request, $next){
    
    if(\Auth::user() && \Auth::user()->status){
        return $next($request);
    };
    return redirect('/admin');
})->group(function(){ 
Route::match(['GET','POST'],'/index','AdminController@dashboard')->name('home1');
Route::get('/changecategory','CategoryController@changeCategory')->name('changeCategory');
Route::match(['GET','POST'],'/addcategory','CategoryController@addcategory');
Route::match(['GET','POST'],'/editcategory/{id}','CategoryController@editcategory');
Route::match(['GET','POST'],'/viewcategory','CategoryController@viewcategory')->name('viewcat');
Route::delete('/destroycat/{id}','CategoryController@destroy');
Route::post('/updatecat/{id}','CategoryController@update');

Route::get('/addproduct','ProductController@create');
Route::get('/changeproduct','ProductController@changeProduct')->name('changeProduct');
Route::post('/addproduct/store','ProductController@addproduct');
Route::match(['GET','POST'],'/viewproduct','ProductController@viewproduct')->name('viewprod1');
Route::delete('/destroy/{id}','ProductController@destroy');
Route::match(['GET','POST'],'/edit/{id}','ProductController@edit');
Route::post('/update/{id}','ProductController@update');

Route::get('/showorder','OrderController@showorder');
Route::get('/user','AdminController@showuser');
Route::get('/orderdetail/{id}','OrderController@getorderdetail');

    });
