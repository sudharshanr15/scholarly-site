<?php

use App\Http\Controllers\CampusController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\Session\UserAdminController as SessionUserAdminController;
use App\Http\Controllers\Session\UserController as SessionUserController;
use App\Http\Controllers\Session\UserFacultyController as SessionUserFacultyController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\UserFacultyController;
use App\Http\Controllers\Users\UserAdminController;
use App\Http\Middleware\UsersAdminAuth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("/admin")->group(function(){
    // User Authentication
    Route::get("/login", [SessionUserAdminController::class, "create"])->middleware("guest:users_admin")->name("users_admin_login"); 
    Route::post("/login", [SessionUserAdminController::class, "store"]);
    Route::get("/register", [UserAdminController::class, "create"])->middleware("guest:users_admin");
    Route::post("/register", [UserAdminController::class, "store"]);
    Route::post("/logout", [SessionUserAdminController::class, "destroy"]);

    // Email Verification
    Route::get("/email/verify", function(){
        return view("auth.verify-email");
    })->middleware("auth:users_admin")->name("user_admin.verification.notice");

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
    
        return redirect('/');
    })->middleware(["auth:users_admin", 'signed'])->name('user_admin.verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
    
        return back()->with('message', 'Verification link sent!');
    })->middleware(["auth:users_admin", 'throttle:6,1'])->name('user_admin.verification.send');
});

Route::prefix("/faculty")->group(function(){
    // User Authentication
    Route::get("/login", [SessionUserFacultyController::class, "create"])->middleware("guest:users_faculty")->name("users_faculty_login");
    Route::post("/login", [SessionUserFacultyController::class, "store"]);
    Route::get("/register", [UserFacultyController::class, "create"])->middleware("guest:users_faculty");
    Route::post("/register", [UserFacultyController::class, "store"]);
    Route::post("/logout", [SessionUserFacultyController::class, "destroy"]);

    // Email Verification
    Route::get("/email/verify", function(){
        return view("auth.verify-email");
    })->middleware("auth:users_faculty")->name("user_faculty.verification.notice");

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
    
        return redirect('/');
    })->middleware(["auth:users_faculty", 'signed'])->name('user_faculty.verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
    
        return back()->with('message', 'Verification link sent!');
    })->middleware(["auth:users_faculty", 'throttle:6,1'])->name('user_faculty.verification.send');
});

Route::prefix("/maintainer")->group(function(){
    Route::get("/login", [SessionUserController::class, "create"])->name("login");
    Route::post("/login", [SessionUserController::class, "store"]);
    Route::get("/register", [UserController::class, "create"]);
    Route::post("/register", [UserController::class, "store"]);
    Route::post("/logout", [SessionUserController::class, "destroy"]);

    Route::middleware("auth")->group(function(){
        Route::get("/campus", [CampusController::class, "create"])->name("campus.index");
        Route::post("/campus", [CampusController::class, "store"]);
        Route::get("/campus/{id}", [CampusController::class, "edit"])->name("campus.edit");
        Route::post("/campus/{id}", [CampusController::class, "update"]);

        Route::get("/school", [SchoolController::class, "create"])->name("school.index");
        Route::post("/school", [SchoolController::class, "store"]);
        Route::get("/school/{id}", [SchoolController::class, "edit"])->name("school.edit");
        Route::post("/school/{id}", [SchoolController::class, "update"]);

        Route::get("/department", [DepartmentController::class, "create"])->name("department.index");
        Route::post("/department", [DepartmentController::class, "store"]);
        Route::get("/department/{id}", [DepartmentController::class, "edit"])->name("department.edit");
        Route::post("/department/{id}", [DepartmentController::class, "update"]);
    });
});

// Email Verification
Route::get("/email/verify", function(){
    return view("auth.verify-email");
})->middleware("auth")->name("verification.notice");

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(["auth", 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(["auth", 'throttle:6,1'])->name('verification.send');