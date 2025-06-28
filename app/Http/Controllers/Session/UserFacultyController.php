<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserFacultyController extends Controller
{
    private string $guard = "users_faculty";

    public function create(){
        return view("users_faculty.login");
    }

    public function store(Request $request){
        // validate
        $attr = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"]
        ]);

        // login
        if(!Auth::guard($this->guard)->attempt($attr)){
            throw ValidationException::withMessages([
                "email" => "Sorry, the credetials could not be found"
            ]);
        }

        // redirect
        $request->session()->regenerate();

        return redirect("/");
    }

    public function destroy(Request $request){
        Auth::guard($this->guard)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect("/");
    }
}
