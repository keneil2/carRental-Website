<?php

use App\Http\Controllers\UsersController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\adminsController;
use App\Http\Controllers\AdminsLogin;

Route::get('/', function () {
  return view('index');
});



Route::get("/signup", [UsersController::class, "showForm"])->name("Signup");



Route::get("/login", [UsersController::class, "showlogin"]);


Route::post("/login", [UsersController::class, "authenticated"])->name("userlogin");



Route::post("/signup", [UsersController::class, "register"]);

Route::get("/home", function () {
  return view("home");
})->middleware("AuthUsers");

// Email varification routes 
// email varification notice
Route::get("email/verify",[UsersController::class,"verifyNotice"])->name('verification.notice')->middleware("AuthUsers");

// email varification handler
Route::get("email/verify/{id}/{hash}",[UsersController::class,"verifyEmail"])->name("verification.verify");

 // email resender
 Route::post("/email/resend/verification-notification",[UsersController::class,"ResendEmail"])->name('verification.send');

Route::post("/logout", [adminsController::class, "logoutUser"])->name("logout");


Route::get("/admin/signup", [adminsController::class, "show"]);

Route::post("/admin/signup", [adminsController::class, "CreateAccount"]);

Route::get("/admin/login", [AdminsLogin::class, "showloginForm"])->name("admin.login.get");

Route::post("/admin/login", [AdminsLogin::class, "loginAdmin"])->name("admin.login.post");
Route::middleware("AuthUsers")->group(function(){
  Route::get("/dashboard", function () {
    return view("dashboard");
  })->name("dashboard");
});



// Route::post("/Emailverification", [adminsController::class, "verifyEmail"])->name("Emailvar.post");

// Route::get("/Emailverification/{username?}", [adminsController::class,"showemailvarPage"])->name("Emailvar.get");