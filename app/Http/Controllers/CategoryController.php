<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use App\Product;

use Session;

class CategoryController extends Controller
{
    //
    public function add(Request $request){
    	$categories = new Category;
    	$categories->categories = $request->name;
    	$categories->save();

    	Session::flash('update','Category Succesfuly Added');
    	return redirect()->back();
    }

    public function show($id){
    	$data = Product::where('category_id',$id)->get();
    	if($data->count() == 0){
    		dd("product kosong");
    	}
    	else{

    		// return response()->json($data);
    		return view('ajax.category.list_category',compact('data'));
    	}
    	
    }

    public function all(){
    	$data = Product::all();
    	return view('ajax.category.list_category',compact('data'));
    }
}
