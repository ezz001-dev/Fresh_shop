<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Cart;

use Auth;

class CartController extends Controller
{
    public function cart(Request $request,$id)
    {

    	
         $cek = Cart::where([
                        ['user_id', Auth::id()],
                        ['product_id', $id],
                    ])->count();

         $cart = Cart::where([
                        ['user_id', Auth::id()],
                        ['product_id', $id],
                    ])->first();
         
         if ($cek == 1) {
             $quantity = $cart->quantity;
             $cart->quantity = $quantity + $request->quantity;
             $cart->subtotal = $cart->product->price * $cart->quantity;
             $cart->save();
         }else
         {

            $data = Product::find($request->id);
                $result = [

                    'user_id'      => Auth::user()->id,
                    'product_id'   => $id,
                    'username'     => Auth::user()->username,
                    'product_name' => $data->name,
                    'price'        => $data->price,
                    'type'         => $data->type,
                    'quantity'     => $request->quantity,
                    'subtotal'     => $data->price * $request->quantity,
                ];  
            
                Cart::insert($result);
         }


    	return response()->json([
            "message" => "Barang sudah masuk ke cart",
        ]);
    }


    public function update(Request $request,$id)
    {
        
        $cart = Cart::find($id);
        $cart->quantity = $request->quantity;
        $cart->subtotal = $cart->quantity * $cart->price;
        $cart->save();

        $total = Cart::where('user_id',Auth::user()->id)->sum('subtotal');
        return response()->json([
            'subtotal' => number_format($cart->subtotal, 0, ',', '.'),
            'total'    => number_format($total, 0, ',', '.'),
        ]);
    }

    public function delete(Request $request,$id)
    {
        $cart = Cart::find($request->id)->delete();

        $total = Cart::where('user_id',Auth::user()->id)->sum('subtotal');
        return response()->json([
            'total' => $total,
        ]); 
 
    }

}
