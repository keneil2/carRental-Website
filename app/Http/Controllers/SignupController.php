<?php

namespace App\Http\Controllers;

use App\Models\customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class  SignupController extends Controller
{
    public function register (Request $request)
    {
        $messages=[
             "Email.required"=>"Please Enter an Email address",
             "Username.required"=>"Please Enter a username",
             "Pwd.required"=>"A password is required",
             "Pwd.min"=>"password must be 8 characters long",
             "Username.regex"=>"username mus be letter and numbers only",
             "email"=>"invalid email address",
        ];
        $request->validate([
            "Username"=>["required","string","max:50","regex:/^[a-zA-Z]+[0-9]*$/"],
            "Email"=>["required","email","max:255"],
            "Pwd"=>["required","string","min:8"]
        ],$messages);
        $hashedPwd=Hash::make($request->input("Pwd"));
        $newuser= new customers;
        $newuser->userName=$request->input("Username");
        $newuser->email=$request->input("Email");
        $newuser->pwd=$hashedPwd;
        $newuser->save();
    }
    //
}
