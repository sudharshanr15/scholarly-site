<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function create(){
        return view("login");
    }

    public function store(Request $request){
        $attributes = $request->validate([
            "email" => ['required', 'email'],
            "password" => ["required"]
        ]);

        if(!Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                "email" => "Sorry, those credentials do not match"
            ]);
        }

        $request->session()->regenerate();
        return redirect("/");
    }

    public function destroy(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect("/");
    }
}
