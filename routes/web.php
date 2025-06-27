<?php

use App\Http\Controllers\Session\UsersAdminController as SessionUsersAdminController;
use App\Http\Controllers\Users\UsersAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("/admin")->group(function(){
    Route::get("/login", [SessionUsersAdminController::class, "create"]); 
    Route::post("/login", [SessionUsersAdminController::class, "store"]);
    Route::get("/register", [UsersAdminController::class, "create"]);
    Route::post("/register", [UsersAdminController::class, "store"]);
    Route::post("/logout", [SessionUsersAdminController::class, "destroy"]);
});
