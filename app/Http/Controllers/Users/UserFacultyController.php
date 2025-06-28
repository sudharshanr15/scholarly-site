<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\UserFaculty;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserFacultyController extends Controller
{
    private string $guard = "users_faculty";

    public function create(){
        return view("users_faculty.register");
    }

    public function store(Request $request){
        $attr = $request->validate([
            "full_name" => ["required", "min:3"],
            "email" => ["required", "email", "unique:users_faculty"],
            "password" => ["required", Password::min(8)->mixedCase()->numbers()],
            "mobile" => ["required"]
        ]);

        $user = UserFaculty::create($attr);

        event(new Registered($user));

        Auth::guard($this->guard)->login($user);
        // $user->sendEmailVerificationNotification();

        return redirect("/");
    }
}
