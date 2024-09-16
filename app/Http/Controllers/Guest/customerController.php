<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class customerController extends Controller
{

public function index(){
    return view('/pages/guest/customer_info');
    $cart = session()->get('cart',[]);
    $dd($cart);
}


public function storeData(Request $request){
    $customer_data = $request->validate([
       'name'=> 'required',
       "email" => 'required|email',
       "address"=>'required',
       "phone"=>'required',
       "zipcode"=>'required' 
    ]);

    session()->put('customer_data',$customer_data);

    return response()->json(['success' => true]);

}
}
