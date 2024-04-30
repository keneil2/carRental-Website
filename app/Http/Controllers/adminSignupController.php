<?php

namespace App\Http\Controllers;
use App\Models\admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminSignupController extends Controller
{
    public function show(){
      return view("adminsignup");
    }


    public function CreateAccount(Request $request){
        $message=[
                "username.required"=>"please enter a username",
                "username.regex"=>"your username must contain letters and numbers only",
                "username.min"=>" the username must be at least 8 characters long",
                "password.required"=>" please enter a password",
                "password.regex"=>"password must contain letter, number or !@#$&",
                "password.confirmed"=>"the passwords do not match",
        ];
      $request->validate([
        "username"=>["required","regex:/[A-Za-z]+[0-9]*/","min:8",""],
        "password"=>["required","regex:/[A-Za-z]+[0-9]*[!@#$&]*/","min:5","confirmed"]
      ]);
      $pass=Hash::make($request->input("password"));
    $admin=new admins;
    $admin->username=$request->input("username");
    $admin->Pwd= $pass;
    $admin->save();

    }
}