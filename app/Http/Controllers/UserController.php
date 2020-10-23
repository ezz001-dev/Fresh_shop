<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Cart;

use App\Order;

use Session;

use Auth;

class UserController extends Controller
{

	public function __construct()
	{
		return $this->middleware('auth');
	}

    public function profile($id)
    {
        if (Auth::user()->role == 'admin') {
            return abort(404);
        }
        else if(Auth::user()->id == $id){
            
            $order_count = Order::where([['user_id',Auth::user()->id],['status','WAITING']])->count();
            if ($order_count > 0) {
                Session::flash('order_count','anda memiliki '.$order_count.' orderan yang belum diselesaikan');
            }
            $data  = User::where('id',$id)->get();
            $carts = Cart::where('user_id',$id)->get();
            $count = $carts->count();
            $total = Cart::where('user_id',Auth::user()->id)->sum('subtotal');
            return view('users.profile',compact('data','carts','total','count'));
        }else{
            return abort(404);
        }

    }

    public function edit(Request $request)
    {

        $row   = User::find($request->id);
        $images = $request->file('images');  
        if($images != null)
        {
             $this->validate($request,[
                'images'=>'required|file|image|mimes:jpeg,png,jpg|max:5000'
            ]); 
                $path   = 'Users';
                $name   = $images->getClientOriginalName(); 
                $images->move('freshshop/images/'.$path,$name);   
        }
        else
        {
            $name = $row->image;
        }    


            
    	 $data = [
    	 	'username' => $request->username,
    	 	'phone'    => $request->phone,
    	 	'gender'   => $request->gender,
    	 	'profesi'  => $request->profesi,
    	 	'addres'   => $request->addres,
    	 	'city'     => $request->city,
    	 	'provinci' => $request->provinci,
    	 	'birth'    => $request->birth,
            'image'    => $name,
    	 ];

    	 User::where('id',$request->id)->update($data);
         Session::flash('update','Profile Has Been Changed'); 
         return redirect()->back();

    }   
}        
