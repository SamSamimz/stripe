<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    
    // 
      public function checkout()
    {   
        // Enter Your Stripe Secret
        Stripe::setApiKey('my stripe secret');
        		
		$amount = 100;
		$amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = PaymentIntent::create([
			'description' => 'Stripe Payment',
			'amount' => $amount,
			'currency' => 'INR',
			'description' => 'Payment From Sam Samim',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('checkout.credit-card',compact('intent'));

    }

    public function afterPayment()
    {
        echo 'Payment Has been Received';
    }
    // 


}
