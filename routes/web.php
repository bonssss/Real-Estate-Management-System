<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\Property\PropertyController::class, 'index'])->name('home');

Route::get('props/property-details/{id}', [App\Http\Controllers\Property\PropertyController::class, 'single'])->name('single.prop');


Route::post('props/property-details/{id}', [App\Http\Controllers\Property\PropertyController::class, 'sendRequest'])->name('insert.request');
