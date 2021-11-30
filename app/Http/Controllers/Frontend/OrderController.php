<?php

namespace App\Http\Controllers\Frontend;

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

class OrderController extends Controller
{
    public function storeOrder(Request $request){

    	$customer =  Sentinel::getUser();
        // dd($customer_id);
    	$trip_price = (int)$request->input('trip_price');

    	$kids = $request->input('kid');
    	$number_of_kids = count($kids);

    	$total_amount = $trip_price * $number_of_kids ;

    	$order = new Order;
    	$order->customer_id      = $customer->id;
        $order->trip_id     	 = $request->trip_id;
        $order->trip_price     	 = $request->trip_price;
        $order->total_amount     = $total_amount;
        $order->save();

        //dd($order);

        foreach ($kids as $kid) {
       	    $order->childrens()->attach($kid);     
        }

        Mail::send('mails.ordered', $customer->toArray(), 
            function($message) use ( $customer ) {
             $message->to($customer->email);

             $message->subject("Hello $customer->first_name,
                        reset your password.");
        });
        
        return redirect('/customer_dashboard')->with('success', 'Order have been saved successfully.'); 
    }

    public function orders()
    {
        $customer =  Sentinel::getUser();
        $orders =Order::where('customer_id', $customer->id)->get();
        return view('frontend.orders', compact('customer', 'orders'));
    } 
}
