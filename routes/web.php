<?php

use App\Http\Controllers\CampusController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyCitationController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\Session\UserAdminController as SessionUserAdminController;
use App\Http\Controllers\Session\UserController as SessionUserController;
use App\Http\Controllers\Session\UserFacultyController as SessionUserFacultyController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\UserFacultyController;
use App\Http\Controllers\Users\UserAdminController;
use App\Http\Middleware\UsersAdminAuth;
use App\Http\Middleware\UsersFacultyAuth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if(Auth::user()){
        return redirect()->route("console.index");
    }else if(Auth::guard("users_admin")->user()){
        return redirect()->route("admin.index");
    }else if(Auth::guard("users_faculty")->user()){
        return redirect()->route("faculty.index");
    }else{
        throw new ModelNotFoundException();
    }
});

/**
 * Guest User Routes
 */
Route::middleware("guest")->group(function(){
    /**
     * Session Authentication endpoints
     */
    Route::get("/admin/login", [SessionUserAdminController::class, "create"])->middleware("guest:users_admin")->name("admin.login"); 
    Route::post("/admin/login", [SessionUserAdminController::class, "store"]);

    Route::get("/faculty/login", [SessionUserFacultyController::class, "create"])->middleware("guest:users_faculty")->name("faculty.login");
    Route::post("/faculty/login", [SessionUserFacultyController::class, "store"]);

    Route::get("/console/login", [SessionUserController::class, "create"])->name("login");
    Route::post("/console/login", [SessionUserController::class, "store"]);
});

/**
 * Admin User Routes
 */
Route::prefix("/admin")->group(function(){
    /**
     * User Registration and Session
     */
    Route::get("/register", [UserAdminController::class, "create"])->middleware("auth")->name("admin.register");
    Route::post("/register", [UserAdminController::class, "store"])->middleware("auth");
    Route::post("/logout", [SessionUserAdminController::class, "destroy"]);

    /**
     * Email Verification
     */
    Route::prefix("/email")->group(function(){
        Route::get("/verify", function(){
            return view("auth.verify-email");
        })->middleware("auth:users_admin")->name("admin.verification.notice");
    
        Route::get('/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
            $request->fulfill();
        
            return redirect('/');
        })->middleware(["auth:users_admin", 'signed'])->name('admin.verification.verify');
    
        Route::post('/verification-notification', function (Request $request) {
            $request->user()->sendEmailVerificationNotification();
        
            return back()->with('message', 'Verification link sent!');
        })->middleware(["auth:users_admin", 'throttle:6,1'])->name('admin.verification.send');
    });

    /**
     * Authorized User endpoints
     */
    Route::middleware(UsersAdminAuth::class)->group(function(){
        Route::get("/", [UserAdminController::class, "index"])->name("admin.index");
        Route::get("/faculty", [UserFacultyController::class, "index__admin"])->name("admin.faculty.index");
        Route::get("/faculty/register", [UserFacultyController::class, "create"]);
    });
});

/**
 * Faculty User Routes
 */
Route::prefix("/faculty")->group(function(){
    /**
     * User Registration and Session
     */
    Route::get("/register", [UserFacultyController::class, "create"])->middleware(UsersAdminAuth::class)->name("faculty.register");
    Route::post("/register", [UserFacultyController::class, "store"])->middleware(UsersAdminAuth::class);
    Route::post("/logout", [SessionUserFacultyController::class, "destroy"]);

    /**
     * Email verification
     */
    Route::prefix("/email")->group(function(){

        Route::get("/verify", function(){
            return view("auth.verify-email");
        })->middleware("auth:users_faculty")->name("faculty.verification.notice");
    
        Route::get('/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
            $request->fulfill();
        
            return redirect('/');
        })->middleware(["auth:users_faculty", 'signed'])->name('faculty.verification.verify');
    
        Route::post('/verification-notification', function (Request $request) {
            $request->user()->sendEmailVerificationNotification();
        
            return back()->with('message', 'Verification link sent!');
        })->middleware(["auth:users_faculty", 'throttle:6,1'])->name('faculty.verification.send');
    });

    /**
     * Authorized User endpoints
     */

    Route::middleware([UsersFacultyAuth::class])->group(function(){
        Route::get("/", [UserFacultyController::class, "index"])->name("faculty.index");
        Route::get("/citation/{id}", [FacultyCitationController::class, "edit"]);
        Route::post("/citation/{id}", [FacultyCitationController::class, "update_faculty"]);
    });
});

/**
 * Super User Routes
 */
Route::prefix("/console")->group(function(){
    /**
     * User Registration and Session
     */
    /**
     * Table Name: users => /console
     */
    Route::get("/register", [UserController::class, "create"])->name("register");
    Route::post("/register", [UserController::class, "store"]);
    Route::post("/logout", [SessionUserController::class, "destroy"])->name("logout");

    /**
     * Authorized User endpoints
     */
    Route::middleware("auth")->group(function(){
        Route::get("/", [UserController::class, "show"])->name("console.index");

        Route::get("/campus", [CampusController::class, "index"])->name("campus.index");
        Route::get("/campus/add", [CampusController::class, "create"])->name("campus.create");
        Route::post("/campus/add", [CampusController::class, "store"]);
        Route::get("/campus/{id}", [CampusController::class, "edit"])->name("campus.edit");
        Route::post("/campus/{id}", [CampusController::class, "update"]);

        Route::get("/school", [SchoolController::class, "index"])->name("school.index");
        Route::get("/school/add", [SchoolController::class, "create"])->name("school.create");
        Route::post("/school/add", [SchoolController::class, "store"]);
        Route::get("/school/{id}", [SchoolController::class, "edit"])->name("school.edit");
        Route::post("/school/{id}", [SchoolController::class, "update"]);

        Route::get("/admin", [UserAdminController::class, "index__console"])->name("console.admin.index");

        Route::get("/department", [DepartmentController::class, "index"])->name("department.index");
        Route::get("/department/add", [DepartmentController::class, "create"])->name("department.create");
        Route::post("/department/add", [DepartmentController::class, "store"]);
        Route::get("/department/{id}", [DepartmentController::class, "edit"])->name("department.edit");
        Route::post("/department/{id}", [DepartmentController::class, "update"]);
    });
});

/**
 * Super User Email verification
 */
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