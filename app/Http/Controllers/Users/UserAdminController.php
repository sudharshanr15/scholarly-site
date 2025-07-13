<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\UserAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;

class UserAdminController extends Controller
{   
    private string $guard = "users_admin";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table("users_admin as u")
            ->join("departments as d", "u.department_id", "=", "d.id")
            ->get(["u.id", "u.full_name", "u.email", "u.mobile_no", "u.department_id", "u.created_at", "u.email_verified_at", "d.name as department_name"]);

        return view("admin.index", ["users" => $users]);
    }

    /**
     * index of console user
    */
    public function index__console(){
        $users = DB::table("users_admin as u")
            ->join("departments as d", "u.department_id", "=", "d.id")
            ->get(["u.id", "u.full_name", "u.email", "u.mobile_no", "u.department_id", "u.created_at", "u.email_verified_at", "d.name as department_name"]);

        return view("console.admin.index", ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();

        return view("admin.register", ["departments" => $departments]);
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
