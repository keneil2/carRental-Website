<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\VarificationEmail;

class UsersController extends Controller
{
    public function showForm()
    {
        return view("signup");
    }
    public function verifyNotice(){
       return view("Emailvar");
    } 

    public function verifyEmail(EmailVerificationRequest $request){
    $request->fulfill();
    return route("dashboard");
    }
    public function sendEmailVarification(Request $request){
        session()->flash("user",$request->user());
        $user=$request->user();
    $user->sendEmailVerificationNotification();
    }
    public function ResendEmail(){
   
       $user=Auth::guard("customers")->user();
       if($user->hasverifyEmail()){
    return redirect()->route("dashboard");
       }
        $user->sendEmailVerificationNotification();

    }

    private function VarCode()
    {
      $code = mt_rand(10000000, 1000000000);
      return $code; 
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
        



        $user=$request->validate([
            "Username" => ["required", "string", "max:50", "regex:/^[a-zA-Z]+[0-9]*$/","unique:customers,name"],
            "Email" => ["required", "email", "max:255","unique:customers,email"],
            "Pwd" => ["required", "string", "min:8"]
        ], $messages);

       // saved user 
        $hashedPwd = Hash::make($request->input("Pwd"));
        $newuser = Customers::create([
            "name"=>$request->Username,
            "email"=>$request->Email,
            "password"=>$hashedPwd,
            "role_id"=>1
        ]);
        
        // Authenticate the user
       Auth::guard("customers")->login($newuser,$remember=true);
   
        event(new Registered($newuser));
        
       
       return  redirect()->route("verification.notice");
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

        $users = Customers::where("email", "=", $request->input("email"))->first();
        // dd($users);
        if ($users) {

            if (Auth::guard("customers")->attempt( $credentials)) {

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
