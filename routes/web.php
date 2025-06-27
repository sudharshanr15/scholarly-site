<?php

use App\Http\Controllers\Session\UsersAdminController as SessionUsersAdminController;
use App\Http\Controllers\Users\UsersAdminController;
use App\Http\Middleware\UsersAdminAuth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware(UsersAdminAuth::class);

Route::prefix("/admin")->group(function(){
    Route::get("/login", [SessionUsersAdminController::class, "create"])->middleware("guest:users_admin")->name("users_admin_login"); 
    Route::post("/login", [SessionUsersAdminController::class, "store"]);
    Route::get("/register", [UsersAdminController::class, "create"])->middleware("guest:users_admin");
    Route::post("/register", [UsersAdminController::class, "store"]);
    Route::post("/logout", [SessionUsersAdminController::class, "destroy"]);
});

Route::get("/email/verify", function(){
    return view("auth.verify-email");
})->middleware("auth:users_admin")->name("verification.notice");

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/');
})->middleware([UsersAdminAuth::class, 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(["auth:users_admin", 'throttle:6,1'])->name('verification.send');