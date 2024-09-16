<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Auth;

class loginController extends Controller
{
    public function index(){
        return view('pages/auth/Login');
    }
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
        else{
        return back()->with(['error' => 'The provided credentials do not match our records.']);
    }
    }

    
}
