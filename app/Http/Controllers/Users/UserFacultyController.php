<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\UserFaculty;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserFacultyController extends Controller
{
    private string $guard = "users_faculty";

    public function create(){
        $departments = Department::all();

        return view("users_faculty.register", ["departments" => $departments]);
    }

    public function store(Request $request){
        $attr = $request->validate([
            "full_name" => ["required", "min:3"],
            "email" => ["required", "email", "unique:users_faculty"],
            "password" => ["required", Password::min(8)->mixedCase()->numbers()],
            "department_id" => ["required", "exists:departments,id"],
            "mobile" => ["required"]
        ]);

        $user = UserFaculty::create($attr);

        event(new Registered($user));

        Auth::guard($this->guard)->login($user);
        // $user->sendEmailVerificationNotification();

        return redirect("/");
    }
}
