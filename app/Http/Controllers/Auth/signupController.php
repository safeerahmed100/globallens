<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Hash;
use App\Models\User;

class signupController extends Controller
{
    public function index(){
        return view('/pages/auth/Signup');
    }

    public function signup(Request $request){
        
        $validator = Validator::make ($request->all(),[
             'first_name' => 'required|string|max:255',
             'last_name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|min:8',
         ]);
 
         if(!$validator->fails()){
             $user = new User();
             $existingUser = $user::where('email',$request->email)->first();
             if(!$existingUser){
                 $user->first_name = $request->first_name;
                 $user->last_name = $request->last_name;
                 $user->email = $request->email;
                 $user->password = Hash::make($request->password);
                 $user->save();
                 event(new Registered($user));
                Auth::login($user);
                
                 
                 return redirect()->route('admin.dashboard');
             }
             else{
                 return back()->with(['error' => 'Email Already Registered.']);
             }
 
         }
         else{
             return back()->with(['error' => 'Fields are Empty.']);
         }
     }
}
