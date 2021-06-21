<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Auth;

class myOrdersController extends Controller
{
    public function show(){
        $tickets = Ticket::all()->where("user_id","=",\Auth::id())->load("products")->load("details");
        $user = Auth::user();
//        dd($tickets);
        return view("myOrders",compact("tickets","user"));
    }
}
