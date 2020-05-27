<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function show(Request $request, $id)
  {
      $value = $request->session()->get('key');

      //
  }

  public function register(Request $request)
  {
    return view("auth.register");
      //
  }


  
}
