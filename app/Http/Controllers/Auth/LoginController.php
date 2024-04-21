<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customers;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
   public  function showlogin(){
        return view("login");
    }
    public function login(Request $request)
    {
        $message=[
            "email.required"=>" enter your Email address",
          "email"=>"invalid Email address",
          "pwd.required"=>"please enter a password",
          "pwd.min"=>"your password is 8 letters long"
        ];
        $request->validate([
            "email"=>["required","string","email","max:255"],
            "pwd"=>["required","string","min:8"],
        ],$message);
         $user=customers::where("email","=",$request->email)->first();
         if($user){
          if(Hash::check($request->pwd,$user->pwd)){
            return back()->with("success","Pwd and Email found");
         }
    }else{
        return back()->with("fail","This email is not registered");
     }
    }
}