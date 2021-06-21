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
Route::post("/payment1",['App\Http\Controllers\paymentController','create'])->name("paymentMethod")->middleware("auth");
Route::get("/payment1",['App\Http\Controllers\paymentController','reciv'])->name("returnPayment")->middleware("auth");
Route::get("/orders",['App\Http\Controllers\myOrdersController','show'])->name("myOrders")->middleware("auth");
