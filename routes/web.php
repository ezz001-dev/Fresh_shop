<?php

use Illuminate\Support\Facades\Route;

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
//     return view('home');
// });
//Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/', function () {
//     return view('freshshop.home');
// });


Route::get('/' , 'FreshshopController@home');
Auth::routes();

Route::get('/index',function(){
	return view('index');
});

Route::get('/home','FreshshopController@home')->name('home');

Route::get('/about' , 'FreshshopController@about');

Route::get('/contact' ,'ContactController@index');

Route::middleware(['auth'])->group(function(){

	Route::get('/shop' , 'ShopController@index');
	Route::get('/cart' , 'ShopController@cart');
	Route::get('/checkout' , 'ShopController@checkout');
	Route::get('/shop/detail' , 'ShopController@detail');
	Route::get('/wishlist' , 'ShopController@wishlist');

});


// === Admin Pages ===
// Route::group(function(){

// });
Route::get('/admin' , 'AdminController@index')->name('admin');
Route::get('/admin/login' , 'AdminController@login')->name('loginAdmin');
Route::post('/admin/login/procces' , 'AdminController@LoginProcces');
Route::get('/admin/user' , 'AdminController@users');
Route::get('/admin/category' , 'AdminController@category');
Route::get('/admin/product' , 'AdminController@product');
Route::get('/admin/carts/search','AdminController@cartsSearch');
Route::get('/admin/profile/{role}', 'AdminController@profile');
Route::post('/admin/edit', 'AdminController@editAdmin');
Route::get('/admin/transaction','AdminController@transaction');
Route::post('/admin/shipped/{id}','AdminController@shipped');

// Products
Route::post('/product/edit' , 'ProductController@edit');
Route::post('/product/add' , 'ProductController@add');
Route::get('/product/delete/{id}' , 'ProductController@delete');
Route::get('/product/details/{id_product}','ProductController@detail');
//Route::get('/products/detail/{id}','ProductController@detail');

// discus
Route::post('/discus/post/{product_id}','DiscusController@post');


// Reply
Route::get('/reply/comment/','ReplyController@reply');

Route::post('/logoutnew','LogoutController@logout');

//profile user 
Route::get('/profile/{id}' , 'UserController@profile');
Route::post('/profile/edit' , 'UserController@edit');

// Cart
Route::post('/cart/{id}','CartController@cart');

Route::post('/cart/update/{id}','CartController@update');
Route::post('/cart/delete/{id}','CartController@delete');

//Order
Route::post('/order/{user_id}','OrderController@orders');
Route::get('/order/order_user','OrderController@test')->name('order_user'); // test
Route::post('/order/delete/{id}','OrderController@delete');
Route::get('/order/report','OrderController@report');


Route::post('/payment','OrderController@payment');
// Route::post('/payment/confirm','OrderController@confirm');


// Category
Route::post('/category/add','CategoryController@add');
Route::get('/categories/all','CategoryController@all');
Route::get('/categories/{id}','CategoryController@show');


// Payments
Route::post('/payment/confirm','PaymentController@uploadPayment');
Route::post('/payments/transaction','PaymentController@index');

//  Api
Route::get('/Api/RajaOngkir','ApiRajaOngkir@index');

// Cek Ongkir
Route::get('/ongkir','ApiRajaOngkir@ongkir');
Route::get('/kota_asal','ApiRajaOngkir@kota_asal');
Route::get('/kota_tujuan','ApiRajaOngkir@kota_tujuan');
Route::post('/cek_ongkir','ApiRajaOngkir@cek_ongkir');

// PDF
Route::get('/pdf','PdfController@index');
Route::get('/pdf/cetakPdf','PdfController@cetakPdf');

