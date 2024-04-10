<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\Property\PropertyController::class, 'index'])->name('home');

Route::get('props/property-details/{id}', [App\Http\Controllers\Property\PropertyController::class, 'single'])->name('single.prop');

//request
Route::post('props/property-details/{id}', [App\Http\Controllers\Property\PropertyController::class, 'sendRequest'])->name('insert.request');

//favorite
Route::post('props/property-favorite/{id}', [App\Http\Controllers\Property\PropertyController::class, 'FavoriteList'])->name('save.favorite');


// route for proprties rent and buy
Route::get('props/type/Buy', [App\Http\Controllers\Property\PropertyController::class, 'PropertyBuy'])->name('buy.prop');

  
//route for rent

Route::get('props/type/Rent', [App\Http\Controllers\Property\PropertyController::class, 'PropertyRent'])->name('rent.prop');

 // route for property types

 Route::get('props/hometype/{propstype}/', [App\Http\Controllers\Property\PropertyController::class, 'propType'])->name('proptype.prop');
 
//contact

 Route::get('contact', [App\Http\Controllers\HomeController::class, 'Contact'])->name('contact');

 // about

 Route::get('about', [App\Http\Controllers\HomeController::class, 'About'])->name('about');


 Route::get('props/price-asce', [App\Http\Controllers\Property\PropertyController::class, 'PriceAsce'])->name('orderby.asce.price');

// price descending
 Route::get('props/price-desce', [App\Http\Controllers\Property\PropertyController::class, 'PriceDesce'])->name('orderby.desce.price');


 // users requests on its side 

//  Route::get('users/sent-requests', [App\Http\Controllers\Users\UsersController::class, 'sentRequests'])->name('users.request');


Route::get('/user-requests', [App\Http\Controllers\Users\UsersController::class, 'showUserRequests'])->name('user.requests');


// favorite list
Route::get('/user-favorites', [App\Http\Controllers\Users\UsersController::class, 'showUserFavorites'])->name('user.favoriets');
// search
Route::any('/search', [App\Http\Controllers\Property\PropertyController::class, 'searchproperty'])->name('search.property');