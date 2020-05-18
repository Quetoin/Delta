<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
  public function index()
  {
      return view('index');
  }

  public function produits()
  {
      return view('produits');
  }

  public function whoarewe()
  {
      return view('whoarewe');
  }

  public function contact()
  {
      return view('contact');
  }
}
