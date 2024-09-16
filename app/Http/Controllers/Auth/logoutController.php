<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class logoutController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
