<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use App\Product;

use App\Discus;

use Session;

class ProductController extends Controller
{

    public function add(Request $request)
    {

        $images = $request->file('gambar'); // request file images
        $name   = $images->getClientOriginalName(); // file name
        $path   = 'products';

        $images->move('freshshop/images/'.$path,$name);

        $data = new Product;
    	
    		$data->name          = $request->name;
    		$data->type	         = $request->type;
    		$data->quantity      = $request->quantity;
    		$data->price         = $request->price;
            $data->details       = $request->details;
            $data->category_id   = $request->category_id;
            $data->images        = $images->getClientOriginalName();
            $data->save();

            Session::flash('add','Product Succes Fully Added');

        return redirect()->back();

    }

    public function edit(Request $request)
    {
        $old_images = Product::find($request->id);
        $result     = $old_images->images;
        $type       = $old_images->type; 

        if ($request->file('gambar')) 
        {
            $images = $request->file('gambar');
            $name   = $images->getClientOriginalName(); // file name
            $path   = 'products';

            $images->move('freshshop/images/'.$path,$name);
            $type   = $request->type;     
        }
        else
        {
            $name = $result;
            $type = $old_images->type;
        }

        $data = Product::where('id',$request->id)->update([
                    'name'      => $request->Product_Name,
                    'type'      => $type,
                    'quantity'  => $request->Quantity,
                    'price'     => $request->Price,
                    'images'    => $name
                  ]);

        // return redirect()->back();

        dd($data);           
    }

    public function detail($id)
    {
        // $data    = Product::all();
        $product = Product::find($id);
        $discuses = Discus::where('product_id',$id)->get();
        // foreach ($discuses as $key) {
        //     foreach ($key->reply as $reply) {
        //         dd($reply->user->username);
        //     }
        // }

        return view('freshshop.shopDetail',compact('product','discuses'));
    }

    public function delete($id)
    {
        $data = Product::where('id',$id)->delete();
        return redirect()->back();
    }

}
