<?php

use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get("/signup",function(){
    return view("signup");
})->name("Signup");
 
Route::post("/signup",[SignupController::class,"register"]);