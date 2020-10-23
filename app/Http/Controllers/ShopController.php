<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FreshshopController;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Product;

use App\Category;

use App\User;

use App\Cart;

use Auth;

class ShopController extends Controller
{
   	public function index()
   	{
        $categories = Category::all();
        // foreach($categories as $category){
        //  dd($category->product->count());
        // }
        $data = Product::all();
        return view('freshshop.shop',compact('data','categories'));

   	}

   	public function cart()
   	{
         $carts = Cart::where('user_id',Auth::user()->id)->get(); 

   		return view('freshshop.cart',compact('carts'));
   	}

   	public function checkout()
   	{

   		return view('freshshop.checkout');
   	}

   	public function detail()
   	{
         $data = Product::all();
   		   return view('freshshop.shopDetail',compact('data'));
   	}

   	public function wishlist()
   	{
   		return view('freshshop.wishlist');
   	}

      
}
