<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Discus;

use Auth;

class DiscusController extends Controller
{
    //
    public function show()
    {
    	// $discus = Discus::all();
    	// if ($discus->count() === 0) {
    	// 	dd("belum ada diskusi");
    	// }
    }

    public function post(Request $request, $product_id)
    {
    	$discuses = Discus::create([
    		'product_id' => $product_id,
    		'user_id'	 => Auth::user()->id,
    		'discus'     => $request->content,
    	]);
    	return redirect()->back();
    }
}
