<?php

use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});
Route::get("/signup",function(){
    return view("signup");
})->name("Signup");
 Route::get("/login",[LoginController::class,"showlogin"]);

 Route::post("/login",[LoginController::class,"authenticated"])->name("loginUser");

Route::post("/signup",[SignupController::class,"register"]);

Route::get("/dashboard",function(){
  return view("dashboard");
})->name("dashboard");
