<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Children;
use App\Models\Customermeta;
use Sentinel;
use Session;
use App\Models\Trip;
use App\Models\Route;
use App\Models\Order;

class OrdersController extends Controller
{
    public function allOrders(Request $request)
    {
        $from_date = $request->input('from_date');
        $to_date   = $request->input('to_date');

        // start query 
        $query = Order::query();

       if($request->has('from_date') &&  $request->has('to_date') ) {
          
            $query = $query->where('created_at', '>=', $from_date)
                           ->where('created_at', '<=', $to_date);
       }

       if($request->has('query') ) {
           
            $query = $query->whereHas('user', function($query) use ($request) {
                     $query->where('first_name', 'like', '%'.$request->input('query').'%');
                }); 
        }




        $orders =  $query->get();    

        return view('admin.all-orders', compact('orders'));
    } 

   

    public function orderDetail($id){
        $order =Order::where('id', $id)->first();
        // dd($order);
        return view('admin.order-detail', compact('order'));
    }
    
}
