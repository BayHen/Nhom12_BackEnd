<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // public function index ($id = "products") {
    //     return view('products', ['id' => $id]);
    // }
    public function index(){
        return view('categories');
    }

    public function indexs(){
        return view('products_detail');
    }

}
