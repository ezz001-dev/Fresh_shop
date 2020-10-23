<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\User;

use Auth;

class FreshshopController extends Controller
{

	public function data()
	{
		$data = Product::all();
		return $data;
	}
	
    public function home()
    {
        
    	$data = $this->data();
    	return view('freshshop.home',compact('data'));
         
    }
    public function about()
    {
    	return view('freshshop.about');
    }

    
}
