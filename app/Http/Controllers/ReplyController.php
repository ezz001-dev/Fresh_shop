<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reply;
use Auth;

class ReplyController extends Controller
{
    //

    public function reply(Request $request)
    {
    	Reply::create([
    		'user_id'   => Auth::user()->id,
    		'discus_id' => $request->discus_id,
    		'content_reply' => $request->content,
    	]);

    	return response()->json([
    		'name'    => Auth::user()->username,
    		'content' => $request->content,
    		'image'   => Auth::user()->image,
    	]);
    }
}
