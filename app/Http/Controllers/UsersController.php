<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function showForm()
    {
        return view("signup");
    }
    public function register(Request $request)
    {
        $messages = [
            "Email.required" => "Please Enter an Email address",
            "Username.required" => "Please Enter a username",
            "Pwd.required" => "A password is required",
            "Pwd.min" => "password must be 8 characters long",
            "Username.regex" => "username mus be letter and numbers only",
            "email" => "invalid email address",
        ];
        $request->validate([
            "Username" => ["required", "string", "max:50", "regex:/^[a-zA-Z]+[0-9]*$/"],
            "Email" => ["required", "email", "max:255"],
            "Pwd" => ["required", "string", "min:8"]
        ], $messages);
        $hashedPwd = Hash::make($request->input("Pwd"));
        $newuser = new User;
        $newuser->name = $request->input("Username");
        $newuser->email = $request->input("Email");
        $newuser->password = $hashedPwd;
        $newuser->save();
    }
    public function showlogin()
    {
        return view("login");
    }


    // public function Logout(Request $request)
    // {
    //     // Auth::logout();
    //     // $request->session()->invalidate();
    //     // $request->session()->regenerateToken();

    //     // return redirect()->route("login");
    // }


    public function authenticated(Request $request)
    {
        $message = [
            "email.required" => " enter your Email address",
            "email" => "invalid Email address",
            "password.required" => "please enter a password",
            "password.min" => "your password is 8 letters long"
        ];
        $credentials = $request->validate([
            "email" => ["required", "string", "email", "max:255"],
            "password" => ["required", "string", "min:8"],
        ], $message);

        $users = User::where("email", "=", $request->input("email"))->first();
        // dd($users);
        if ($users) {

            if (Hash::check($request->input("password"), $users->password)) {

                session()->put("userId", $users->id);
                return redirect()->intended("/home");

            }

        }

        return back()->with("fail", "incorrect username or Password");

    }
    public function logoutUser(Request $request){
        if(session()->has("userId")){
             session()->pull("userId");
        }

        $request->session()->invalidate();
       $request->session()->regenerateToken();
       return redirect("/login");
    }
}
