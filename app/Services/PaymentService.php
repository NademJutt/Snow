<?php 

namespace App\Services;

use Stripe;

class PaymentService 
{
	public function charge($total_amount, $stripeToken)
	{
		Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripe_response = Stripe\Charge::create ([
					        "amount"        => 100 * $total_amount,
					        "currency"      => "usd",
					        "source"        => $stripeToken,
					        "description"   => "Payment from Trip Booking."
					    ]);
  		return $stripe_response;
	}
}