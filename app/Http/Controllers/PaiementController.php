<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PaiementController extends Controller
{
    
  public function index(){

    if(Cart::count() <= 0){
      return redirect()->route("boutique");
    }

    Stripe::setApiKey('sk_test_ttZChawv85QYXPztDPZJmk0s00VqNqGWu2');

    $intent = PaymentIntent::create([
      'amount' => round(Cart::total()) ,
      'currency' => 'eur',
      // Verify your integration in this guide by including this parameter
      'metadata' => ['integration_check' => 'accept_a_payment'],
    ]);

    
    $clientSecret = Arr::get($intent, "client_secret");

  
    return view("paiement.index",[
      "clientSecret" => $clientSecret
    ]);
  }


  public function store(Request $request){
    
    Cart::destroy();

    $data = $request->json()->all();
    return $data["paymentIntent"];

  }


}
