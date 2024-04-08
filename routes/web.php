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
