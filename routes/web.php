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



// admin login


Route::get('/admin/login', [App\Http\Controllers\Admin\AdminController::class, 'viewLogin'])->name('view.login');

Route::post('/admin/checklogin', [App\Http\Controllers\Admin\AdminController::class, 'checkLogin'])->name('check.login');

Route::group(['prefix' => 'admin','middleware'=> 'auth:admin'],function(){
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'adminDashboard'])->name('admin.dashboard');
})

;

// Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'adminDashboard'])
//     ->name('check.dashboard')
//     ->middleware('auth:admin');



// create agent

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/agents/create', [App\Http\Controllers\Admin\AdminController::class, 'showCreateAgentForm'])->name('admin.agents.create');
    Route::post('/admin/agents/create', [App\Http\Controllers\Admin\AdminController::class, 'createAgent'])->name('admin.create.agent');
// create home type and list
    Route::get('/admin/allhometypes', [App\Http\Controllers\Admin\AdminController::class, 'homeTypes'])->name('admin.hometypes');
    Route::get('/admin/hometypes/create', [App\Http\Controllers\Admin\AdminController::class, 'createhomeTypes'])->name('admin.hometypes.create');
    Route::post('/admin/hometypes', [App\Http\Controllers\Admin\AdminController::class, 'savecreatehomeTypes'])->name('admin.hometypes.save');


// update hometype  '
Route::get('/admin/hometypes/update/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updatehomeTypes'])->name('admin.hometypes.update');
Route::post('/admin/hometypes/updatesave/{id}', [App\Http\Controllers\Admin\AdminController::class, 'saveupdatehomeTypes'])->name('hometypes.update.save');


// delete home types

Route::get('/admin/hometypes/delete/{id}', [App\Http\Controllers\Admin\AdminController::class, 'deletehomeTypes'])->name('admin.hometypes.delete');

// requests to admin
Route::get('/admin/allrequests', [App\Http\Controllers\Admin\AdminController::class, 'requestsAdmin'])->name('admin.requests');



// properties

Route::get('/admin/allproperties', [App\Http\Controllers\Admin\AdminController::class, 'Properties'])->name('admin.properties');
Route::get('/admin/properties/create', [App\Http\Controllers\Admin\AdminController::class, 'createProperties'])->name('admin.properties.create');
Route::post('/admin/properties/create', [App\Http\Controllers\Admin\AdminController::class, 'savecreateProperties'])->name('admin.properties.save');

// images posts

Route::get('/admin/images/create', [App\Http\Controllers\Admin\AdminController::class, 'createimagespost'])->name('admin.images.create');
Route::post('/admin/images/create', [App\Http\Controllers\Admin\AdminController::class, 'saveimagespost'])->name('admin.images.save');

});
