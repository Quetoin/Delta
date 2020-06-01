<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use App\Order;
use DateTime;

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
    

    $order = new Order();
    $data = $request->json()->all();
    $order->payment_intent_id = $data["paymentIntent"]["id"];
    $order->amount = $data["paymentIntent"]["amount"];
    $order->payment_created_at = (new DateTime())
      ->setTimestamp($data["paymentIntent"]["created"])
      ->format("Y-m-d H:i:s");

    $products = [];
    $i=0;

    foreach(Cart::content() as $product){
      $products["product_".$i][] = $product->model->title;
      $products["product_".$i][] = $product->model->price;
      $products["product_".$i][] = $product->qty;
      $i++;
    }

    $order->products = serialize($products);

    $order->user_id = Auth()->user()->id;

    $order->save();

    if($data["paymentIntent"]["status"] == "succeeded"){
      Cart::destroy();
      Session::flash("success","Votre commande a été traitée avec succès.");
      return response()->json(["success" => "Payment Intent Succeeded"]);
     
    }else{
      return response()->json(["error" => "Payment Intent Not Succeeded"]);
    }
    
  }


  public function merci(){
    return Session::has("success") ? view("paiement.merci") : redirect()->route("boutique");
  }

}
