<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
   public  function showlogin(){
        return view("login");
    }
    public function Logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route("login");
    }
    public function authenticated(Request $request)
    {
        $message=[
            "email.required"=>" enter your Email address",
          "email"=>"invalid Email address",
          "password.required"=>"please enter a password",
          "password.min"=>"your password is 8 letters long"
        ];

       $credentials= $request->validate([ 
            "email"=>["required","string","email","max:255"],
            "password"=>["required","string","min:8"],
        ],$message);
        if(Auth::attempt($credentials)){
              $request->session()->regenerate();
              return redirect()->intended("dashboard");
        }
        return back()->with("fail","Incorrect Username or Password");

    //      $user=customers::where("email","=",$request->email)->first();

    //      if($user){
    //       if(Hash::check($request->pwd,$user->pwd)){
    //         return back()->with("success","Pwd and Email found");
    //      }
    // }else{
    //     return back()->with("fail","Incorrect Username or Password");
    //  }
    }
}