<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\UserAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserAdminController extends Controller
{   
    private string $guard = "users_admin";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();

        return view("users_admin.register", ["departments" => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            "full_name" => ["required", "min:3"],
            "email" => ["required", "email", "unique:users_admin"],
            "password" => ["required", Password::min(8)->mixedCase()->numbers()],
            "department_id" => ["required", "exists:departments,id"],
            "mobile_no" => ["required"]
        ]);

        $user = UserAdmin::create($attributes);

        $user->sendEmailVerificationNotification();

        return redirect("/");
    }

    /**
     * Display the specified resource.
     */
    public function show(UserAdmin $userAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserAdmin $userAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserAdmin $userAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserAdmin $userAdmin)
    {
        //
    }
}
