<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', \App\Http\Livewire\Products::class)->name('home')->middleware("auth");
Route::get('/checkout', \App\Http\Livewire\Checkout::class)->name('checkout')->middleware("auth");

