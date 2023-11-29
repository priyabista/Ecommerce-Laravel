<?php

namespace App\Http\Controllers;

use Faker\Provider\ar_EG\Payment;
use Illuminate\Http\Request;
use Stripe\PaymentMethod;

class StripeController extends Controller
{
    //
    public function session(Request $request)
    {
       \Stripe\Stripe::setApiKey(config('stripe.sk'));
       $productname = unserialize($request->session()->get('productNames'));
       if(is_array($productname)){
        $productnameString = implode('|',$productname);
       }
       else{
        $productnameString = $productname;

       }
       $totalPrice = $request->session()->get('total');
       $two0 = "00";
       $total = "$totalPrice$two0";

       $session = \Stripe\Checkout\Session::create([
           'line_items' => [
            [
                'price_data'=> [
                    'currency' => 'npr',
                    'product_data' => [
                        "name" => $productnameString,

                    ],
                    'unit_amount' => $total,
                ],
                'quantity' => 1,
            ],
            
        ],
        'mode' => 'payment',
        'success_url' => route('success'),
        'cancel_url' => route('checkout.items'),
       ]);
       return redirect()->away($session->url);
    }
    public function success()
    {
        return "Thanks for you order You have just completed your payment. The seeler will reach out to you as soon as possible";
    }

}
