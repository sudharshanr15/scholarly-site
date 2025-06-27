<?php

use App\Http\Controllers\Session\UsersAdminController as SessionUsersAdminController;
use App\Http\Controllers\Users\UsersAdminController;
use App\Http\Middleware\UsersAdminAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware(UsersAdminAuth::class);

Route::prefix("/admin")->group(function(){
    Route::get("/login", [SessionUsersAdminController::class, "create"])->name("users_admin_login"); 
    Route::post("/login", [SessionUsersAdminController::class, "store"]);
    Route::get("/register", [UsersAdminController::class, "create"]);
    Route::post("/register", [UsersAdminController::class, "store"]);
    Route::post("/logout", [SessionUsersAdminController::class, "destroy"]);
});
