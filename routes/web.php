<?php

use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});
Route::get("/signup",[SignupController::class,"showForm"])->name("Signup");
 Route::get("/login",[LoginController::class,"showlogin"]);

 Route::post("/login",[LoginController::class,"authenticated"])->name("login");

Route::post("/signup",[SignupController::class,"register"]);

Route::get("/dashboard",function(){
  return view("dashboard");
})->name("dashboard")->middleware("auth");


Route::post("/logout",[LoginController::class,"Logout"])->name("logout");
