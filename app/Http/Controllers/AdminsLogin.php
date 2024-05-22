<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admins;

class AdminsLogin extends Controller
{
    //
    public function loginAdmin(Request $request)
    {
      $message = [
        "username.required" => "please enter a username",
  
        "username.regex" => "your username must contain letters and numbers only",
  
        "username.min" => " the username must be at least 5 characters long",
  
        "password.required" => " please enter a password",
  
        "password.regex" => "password must contain letter, number or !@#$&",
  
      ];
  
  
  
  
      $credentials = $request->validate([
        "username" => ["required", "regex:/[A-Za-z]+[0-9]*/", "min:5"],
  
        "password" => ["required", "regex:/[A-Za-z]+[0-9]*[!@#$&]*/", "min:5"]
      ]);
  
  
        
  
  
      if (Auth::guard("admins")->attempt(request()->only(["username", "password"]))) {
  
        $request->session()->regenerate();
        $this->isEmailVerified($credentials["username"]);
        return redirect()->route("dashboard");
      }
  
  
  
       return redirect("/admin/login")->with("fail", "incorrect username or password");
  
  
    }



    public function showloginForm()
    {
      return view("adminLogin");
    }


  public function isEmailVerified($username){
    $admindata= Admins::where("username","=",$username)->firstOrFail();
    if($admindata->email_verified_at!==null ||  $admindata->email_verified_at !==""){
    redirect("/admin/login")->with("fail","Your Account is not verified");
    }
   

  }
}
