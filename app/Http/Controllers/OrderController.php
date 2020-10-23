<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Order_detail;

use Carbon\Carbon;

use App\Order;

use App\Cart;

use App\User;

use Session;

use Auth;

use DB;

class OrderController extends Controller
{

    public function orders($user_id)
    {

    	$carts = Cart::where('user_id',Auth::user()->id)->get();

    	foreach ($carts as $cart ) {
    		
    		$data = [
    			'username' => $cart->user->username,
    			'email'    => $cart->user->email,
    			'addres'   => $cart->user->addres,
    			'city'     => $cart->user->city,
    			'provinci' => $cart->user->provinci,
    			'quantity' => Cart::where('user_id',Auth::user()->id)->sum('quantity'),
    			'total'    => Cart::where('user_id',Auth::user()->id)->sum('subtotal'),
    		];

    	}

    	return view('freshshop.orders',compact('data','carts'));
    }

    public function payment(Request $request)
    {   
        
        $carts = Cart::where('user_id',Auth::user()->id)->get();
        $profiles = User::find(Auth::user()->id);
        $total = $carts->sum('subtotal');

        if ($carts->count() === 0) {
            Session::flash('error','Ops, sepertinya keranjang anda kosong !! ');
        }else{

            $order = new Order;
            $order->user_id  = Auth::user()->id;
            $order->invoice_num = 'INV/'.time();
            $order->username = $request->username;
            $order->email    = $request->email;
            $order->addres   = $request->addres;
            $order->country  = $request->country;
            $order->provinci = $request->provinci;
            $order->districts = $request->districts;
            $order->city     = $request->city;
            $order->sub_districts = $request->sub_districts;
            $order->pos_Code = $request->pos_code;
            $order->total    = $total;
            $order->payment  = $request->paymentMethod;
            $order->status   = "WAITING";
            $order->save();

            // Add From Carts To Order Details
            foreach ($carts as $cart) {
                 $order_detail = Order_detail::insert([
                     'order_id'   => $order->id,
                     'product_id' => $cart->product_id,
                     'quantity'   => $cart->quantity,
                     'subtotal'   => $cart->subtotal,
                 ]);     
            }

        // delete item in cart
        Cart::where('user_id',Auth::user()->id)->delete();  
        Session::flash('order','Order Berhasil , Silahkan Upload Bukti Pembayaran');

        }

        $orders = Order::where([['user_id',Auth::user()->id],['status','WAITING']])->get();
        return view('freshshop.payment',compact('orders','total','profiles'));

    }

    public function delete($id){
        $data = Order::where('id',$id)->delete();
        return response()->json([
            'status' => $data,
            'message'=> "data berhasil dihapus"  
        ]);
    }


    public function test()
    {
        dd(Carbon::now()->startOfMonth()->format('d-m-Y H:i:s'));
    }
}
