<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Product;

class HomeController extends Controller
{
    public function index() {

        $productsNew = Product::orderBy('product_id', 'DESC')->get()->take(3);
        $productsTopPick = Product::where('product_feature', 1)->orderBy('product_id', 'DESC')->get()->take(3);
        
        return view('client.pages.home', [
            'productsNew' => $productsNew,
            'productsTopPick' =>$productsTopPick,
        ]);
        
    }
   
}   
