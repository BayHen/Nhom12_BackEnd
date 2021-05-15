<?php

namespace App\Http\Controllers;
    
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function card() {
        return view('card');
    }

    public function checkout() {
        return view('checkout');
    }

}
