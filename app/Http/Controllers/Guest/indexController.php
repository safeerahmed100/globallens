<?php

namespace App\Http\Controllers\Guest;
use App\Models\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
    
        return view('welcome',['products'=>Product::get()]);

    }

    public function productView($id){
        $product= Product::where('id',$id)->first();
        return view('/pages/guest/product-page',['product'=>$product]);

    }
}
