<?php 

function stripe($total_amount, $stripeToken)
{
	$something = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
        "amount"        => 100 * $total_amount,
        "currency"      => "usd",
        "source"        => $stripeToken,
        "description"   => "Payment from Trip Booking."
    ]);

  return $something; 

}
