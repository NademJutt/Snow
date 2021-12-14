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
use Stripe;

class OrderController extends Controller
{
    public function storeOrder(Request $request){

        $request->session()->forget('kids');
        $request->session()->forget('order');

    	$customer =  Sentinel::getUser();

    	$trip_price = (int)$request->input('trip_price');

    	$kids = $request->input('kid');
    	$number_of_kids = count($kids);

    	$total_amount = $trip_price * $number_of_kids ;

        $order = [
            'customer_id'      => $customer->id,
            'trip_id'          => $request->input('trip_id'),
            'trip_price'       => $request->input('trip_price'),
            'total_amount'     => $total_amount
        ];


        session()->put('kids',$kids);
        session()->put('order',$order);


        return view('frontend.buy-trip', compact('total_amount'));
        
    }

    public function buyTrip(Request $request)
    {
        $customer =  Sentinel::getUser();

        $kids = session('kids');
        $order_data = session('order');

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripe_response =  Stripe\Charge::create ([
                                "amount"        => 100 * $order_data['total_amount'],
                                "currency"      => "usd",
                                "source"        => $request->stripeToken,
                                "description"   => "Payment from Trip Booking."
                            ]);

       //dd($stripe_response->id);
       //dd($stripe_response->source->last4);

       //\Log::info(print_r($stripe_response , -1));

       $order = Order::create([
            'customer_id'          => $order_data['customer_id'],
            'trip_id'              => $order_data['trip_id'],
            'trip_price'           => $order_data['trip_price'],
            'total_amount'         => $order_data['total_amount'],
            'transaction_id'       => $stripe_response->id,
            'card_last4'           => $stripe_response->source->last4
            ]);

        foreach ($kids as $kid) {
            $order->childrens()->attach($kid);     
        }



        // Mail::send('mails.ordered', $customer->toArray(), 
        //     function($message) use ( $customer ) {
        //      $message->to($customer->email);

        //      $message->subject("Hello $customer->first_name,
        //                 Your order submitted successfully.");
        // });

        return redirect('/customer_dashboard')->with('success', 'Your order have been saved successfully.');
    }

    public function customerOrders()
    {
        $customer =  Sentinel::getUser();
        $orders =Order::where('customer_id', $customer->id)->get();
        return view('frontend.customer-orders', compact('customer', 'orders'));
    } 
}



// 4242424242424242
