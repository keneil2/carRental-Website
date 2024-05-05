<?php

use App\Http\Controllers\UsersController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\adminsController;

Route::get('/', function () {
  return view('welcome');
});



Route::get("/signup", [UsersController::class, "showForm"])->name("Signup");



Route::get("/login", [UsersController::class, "showlogin"]);



Route::post("/login", [UsersController::class, "authenticated"])->name("userlogin");



Route::post("/signup", [UsersController::class, "register"]);

Route::get("/home", function () {
  return view("home");
})->middleware("AuthUsers");



// ->middleware("auth");


Route::post("/logout", [adminsController::class, "logoutUser"])->name("logout");


Route::get("/adminSignup", [adminsController::class, "show"]);

Route::post("/adminSignup", [adminsController::class, "CreateAccount"]);

Route::get("/adminLogin", [adminsController::class, "showloginForm"])->name("adminLogin");

Route::post("/adminLogin", [adminsController::class, "LoginAdmin"]);

Route::get("/dashboard", function () {
  return view("dashboard");
})->name("dashboard")->middleware("AuthUsers");


Route::post("/Emailverification", [adminsController::class, "EmailVarified"])->name("Emailvar.post");

Route::get("/Emailverification/{username?}", [adminsController::class,"showemailvarPage"])->name("Emailvar.get");