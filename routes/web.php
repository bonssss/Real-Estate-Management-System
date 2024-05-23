<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// update status
Route::put('/properties/{id}/update-status', [App\Http\Controllers\Admin\AdminController::class, 'updateStatus'])->name('update.status');

// send contact
Route::post('/contact/submit', [App\Http\Controllers\Contact\ContactController::class, 'submit'])->name('contacts.submit');

// change password

Route::get('/change-password', [App\Http\Controllers\Users\UsersController::class, 'showChangePasswordForm'])->name('change.password');

// Route to process the password change request
Route::post('/change-password', [App\Http\Controllers\Users\UsersController::class, 'changePassword'])->name('change.password.post');

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
//logout
// web.php
Route::post('/admin/logout', [App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'adminDashboard'])->name('admin.dashboard');
});

// Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'adminDashboard'])
//     ->name('check.dashboard')
//     ->middleware('auth:admin');



// create agent

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/agents', [App\Http\Controllers\Admin\AdminController::class, 'showAgentlist'])->name('admin.agents.list');

    Route::get('/admin/agents/create', [App\Http\Controllers\Admin\AdminController::class, 'showCreateAgentForm'])->name('admin.agents.create');
    Route::post('/admin/agents/create', [App\Http\Controllers\Admin\AdminController::class, 'createAgent'])->name('admin.save.agents');
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
    Route::get('/admin/properties/delete{id}', [App\Http\Controllers\Admin\AdminController::class, 'deleteProperties'])->name('admin.properties.delete');

    Route::get('/admin/agent/delete{id}', [App\Http\Controllers\Admin\AdminController::class, 'deleteAgent'])->name('admin.agent.delete');

    // change password
   // Route to show the change password form
Route::get('/admin/change-password', [App\Http\Controllers\Admin\AdminController::class, 'showChangePasswordForm'])->name('admin.change.password');

// Route to process the password change request
Route::post('/change-password/save', [App\Http\Controllers\Admin\AdminController::class, 'adminchangePassword'])->name('changeowner.password.post');

    // images posts

    Route::get('/admin/images/create', [App\Http\Controllers\Admin\AdminController::class, 'createimagespost'])->name('admin.images.create');
    Route::post('/admin/images/create', [App\Http\Controllers\Admin\AdminController::class, 'saveimagespost'])->name('admin.images.save');
});
    Route::get('/owner/change-password', [App\Http\Controllers\Owner\OwnerController::class, 'showChangePasswordForm'])->name('owner.change.password');

// Route to process the password change request
Route::post('/change-password/save', [App\Http\Controllers\Owner\OwnerController::class, 'changePassword'])->name('changeowner.password.post');




// agent


Route::get('/agent/login', [App\Http\Controllers\Agent\AgentController::class, 'viewagentlogin'])->name('view.agent.login');

Route::post('/agent/login', [App\Http\Controllers\Agent\AgentController::class, 'agentlogin'])->name('save.agent.login');

Route::get('/agent/dashboard', [App\Http\Controllers\Agent\AgentController::class, 'viewagentdashboard'])->name('view.agent.dashboard');

Route::get('/agent/allproperties', [App\Http\Controllers\Admin\AdminController::class, 'Properties'])->name('agent.properties');


// request  sent to agent

Route::get('/agent/allrequests', [App\Http\Controllers\Agent\AgentController::class, 'requestsAgent'])->name('agent.requests');

// properties agents created

Route::get('/agent/allproperties', [App\Http\Controllers\Agent\AgentController::class, 'Properties'])->name('agent.properties');
Route::get('/agent/properties/create', [App\Http\Controllers\Agent\AgentController::class, 'createProperties'])->name('agent.properties.create');
Route::post('/agent/properties/create', [App\Http\Controllers\Agent\AgentController::class, 'savecreateProperties'])->name('agent.properties.save');
// Route::get('/admin/properties/delete{id}', [App\Http\Controllers\Agent\AgentController::class, 'deleteProperties'])->name('admin.properties.delete');




// Owners


// Route::get('/owner/login', [App\Http\Controllers\Owner\OwnerController::class, 'viewownerlogin'])->name('view.owner.login');

// Route::post('/owner/login', [App\Http\Controllers\Owner\OwnerController::class, 'loginowner'])->name('save.owner.login');
// Route::get('/owner/dashboard', [App\Http\Controllers\Owner\OwnerController::class, 'viewownerdashboard'])->name('view.owner.dashboard');

Route::get('/owner/login', [App\Http\Controllers\Owner\OwnerController::class, 'viewownerlogin'])->name('view.owner.login');
Route::post('/owner/login', [App\Http\Controllers\Owner\OwnerController::class, 'loginowner'])->name('save.owner.login');
Route::get('/owner/dashboard', [App\Http\Controllers\Owner\OwnerController::class, 'viewownerdashboard'])
    ->name('view.owner.dashboard')
    ->middleware('auth:owner');

    Route::middleware('auth:owner')->group(function () {
    Route::get('/owner/change-password', [App\Http\Controllers\Owner\OwnerController::class, 'showChangePasswordForm'])->name('owner.change.password');

// Route to process the password change request
Route::post('/change-password/save', [App\Http\Controllers\Owner\OwnerController::class, 'changePassword'])->name('changeowner.password.post');
// Route::get('/owner/dashboard', [App\Http\Controllers\Owner\OwnerController::class, 'ownercountDashboard'])->name('owners.dashboard');

    });

    Route::post('/owner/logout', [App\Http\Controllers\Owner\OwnerController::class, 'logout'])->name('owner.logout');
