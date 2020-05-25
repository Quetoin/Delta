<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
      $products = Product::inRandomOrder()->take(6)->get();
      return view ("products.index")->with("products",$products);
    }

    public function show($slug){
      $product = Product::where("slug", $slug)->firstOrFail();

      return view("products.show")->with('product',$product);
    }

    public function home(){
      $products = Product::inRandomOrder()->take(1)->get();
      return view ("home")->with("products",$products);
    }
}
