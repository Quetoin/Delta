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



/* --- Routes pour les différentes pages du site */
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/whoarewe', 'FrontController@whoarewe')->name('whoarewe');
Route::get('/contact', 'FrontController@contact')->name('contact');
Route::view("/testVue","testVue");


/* --- Routes pour la boutique */
Route::get("boutique", "ProductController@index")->name("boutique");
Route::get("boutique/{slug}","ProductController@show")->name("products.show");

Route::group(['middleware' => 'auth'], function () {
  Route::get("panier", "CartController@index")->name("cart.index");
  Route::post("/panier/ajouter","CartController@store")->name("cart.store");
  Route::patch('/panier/{rowId}', 'CartController@update')->name('cart.update');
  Route::delete("/panier/{rowId}", "CartController@destroy")->name("cart.destroy");
});




/* --- Routes pour les utilisateurs */
Auth::routes();
Route::get("/register","UserController@register")->name("register");
Route::get("/orders","UserController@orders")->name("orders");


/* --- Routes pour le paiement */
Route::group(['middleware' => 'auth'], function () {
  Route::get("paiement", "PaiementController@index")->name("paiement.index");
  Route::post("paiement","PaiementController@store")->name("paiement.store");
  Route::get("/merci", "PaiementController@merci")->name("paiement.merci");
});





Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
