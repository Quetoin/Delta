<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/whoarewe', 'FrontController@whoarewe')->name('whoarewe');
Route::get('/contact', 'FrontController@contact')->name('contact');

Route::get("boutique", "ProductController@index")->name("boutique");
Route::get("boutique/{slug}","ProductController@show")->name("products.show");

Route::get("/register","UserController@register")->name("register");


Route::post("/panier/ajouter","CartController@store")->name("cart.store");

Route::delete("/panier/{rowId}", "CartController@destroy")->name("cart.destroy");

Route::get("vide_panier", function(){
  Cart::destroy();
});

Route::get("panier", "CartController@index")->name("cart.index");
