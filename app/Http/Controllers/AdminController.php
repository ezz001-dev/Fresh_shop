<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use App\Payment;

use App\Product;

use App\Order;

use App\Cart;

use App\User;

use Auth;

use DB;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkAdmin');
    }

    public function index()
    {
        $orders             = Order::count(); // total order
        $orders_process     = Order::where('status','PROCESS')->get(); 
        $count_process      = $orders_process->count(); // total order process
        $transaction        = Payment::count();   // jumlah pembayaran
        $totalTransaction   = Payment::sum('total');
        $numberFormat       = 'Rp. '.number_format($totalTransaction, 0, ',', '.');  // total transaksi
        $users              = User::where('role','buyer')->count();  // jumlah pembeli / user
        return view('admin.dashboard',compact('orders','transaction','numberFormat','users','orders_process','count_process'));
    }

    public function product(){
        $data = Product::all();
        $categories = Category::all();
        $orders_process     = Order::where('status','PROCESS')->get(); 
        $count_process      = $orders_process->count(); // total order process
        return view('admin.product',compact('data','categories','orders_process','count_process'));
    }

    public function category(){
        $orders_process     = Order::where('status','PROCESS')->get(); 
        $count_process      = $orders_process->count(); // total order process
        $categories = Category::all();
        return view('admin.Categories',compact('categories','orders_process','count_process'));  
    }

    public function users()
    {

        $data = User::all();
        $orders_process     = Order::where('status','PROCESS')->get(); 
        $count_process      = $orders_process->count(); // total order process
        return view('admin.userTable',compact('data','orders_process','count_process'));
    }

    public function profile($id)
    {
        $data = User::find($id);
        $orders_process     = Order::where('status','PROCESS')->get(); 
        $count_process      = $orders_process->count(); // total order process
        return view('admin.ProfileAdmin',compact('data','orders_process','count_process'));

    }

    public function editAdmin(Request $request)
    {
          
        $data = User::where('id',$request->id)->update([
            'username' => $request->username,
            'phone'    => $request->phone,
            'gender'   => $request->gender,
            'addres'   => $request->addres,
            'city'     => $request->city,
            'birth'    => $request->birth,
        ]);

        return response()->json([
            "username" => $request->username,
            "phone"    => $request->phone,
            "gender"   => $request->gender,
            "addres"   => $request->addres,
            "city"     => $request->city,
            "birth"    => $request->birth,
        ]);
    }


    public function transaction()
    {
        $orders = Order::all();
        $orders_process     = Order::where('status','PROCESS')->get(); 
        $count_process      = $orders_process->count(); // total order process
        return view('admin.transaction',compact('orders','orders_process','count_process'));

    }

    public function shipped($id)
    {
        $data = Order::find($id)->update([
            'status' => 'SHIPPED',
        ]);

        return response()->json([
            'status'  => $data,
            'message' => 'barang berhasil dikirim',
        ]);

    }

}
