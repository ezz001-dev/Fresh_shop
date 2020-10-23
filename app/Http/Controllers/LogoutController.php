<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\User;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
	    	Auth::logout();
	    	return redirect('/home');
    	
    }
    
}
