<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Payment;

use App\Product;

use App\Order;

use App\Cart;

use Session;

use Carbon;

use Auth;


class PaymentController extends Controller
{
	public function __construct(){
		return $this->middleware('auth');
	}

    // Upload Payments
    public function uploadPayment(Request $request)
    {

    	$image = $request->file('image');
    	$order = Order::find($request->order_id);

    	if ($image != null) {	
    		$count = Payment::where([['user_id',Auth::user()->id],['order_id',$order->id]])->get();
    		if ($count->count() > 0) {
	    			Session::flash('confirm','Ups Anda Sudah Mengupload Bukti Pembayaran Ini');
	    			dd('anda sudah melakukan pembayaran ini');
    			}
    		else
    		{

	    			$this->validate($request,['image'=>'required|file|image|mimes:jpeg,png,jpg|max:5000']);
			    	$path  = 'confirm';
			    	$name  = $image->getClientOriginalName();
			    	$image->move('freshshop/images/Admin/Payment/'.$path,$name);

			    	$payment = new Payment;
			    	$payment->user_id  = Auth::user()->id;
			    	$payment->order_id = $order->id;
			    	$payment->total    = $order->total;
			    	$payment->img      = $name;
			    	$payment->save();

			    	// update status on order
			    	$result = $order->update([
 			    		'status' => 'PROCESS',
 			    	]);

			    	// Update Quantity Product 
			    	$row = Order::where([['user_id',Auth::user()->id],['id',$order->id]])->get();
					foreach($row as $data){
						foreach ($data->orderDetail as $orderDetail) {
							$quantity = $orderDetail->quantity;
							$order_id = $orderDetail->order_id;
							$prdct_id = $orderDetail->product_id;
							$Q_Product = Product::find($prdct_id)->quantity - $quantity;
							Product::find($prdct_id)->update(["quantity" => $Q_Product]);
						}
					}
					
			    	Session::flash('payment','bukti pembayaran sudah masuk , silahkan menunggu konfirmasi admin via email,whatsaap, dan SMS . terimakasih ');
			    	return view('freshshop.confirmPayment');
    			}

			}
			else
			{
				return view('404');
			}

    }
}

