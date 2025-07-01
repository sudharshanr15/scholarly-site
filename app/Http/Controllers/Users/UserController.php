<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function create(){
        return view("register");
    }

    public function store(Request $request){
        $attributes = $request->validate([
            "name" => ["required", "min:3"],
            "email" => ["required", "email", "unique:users"],
            "password" => ["required", Password::min(8)->mixedCase()->numbers()]
        ]);

        $user = User::create($attributes);

        $user->sendEmailVerificationNotification();

        Auth::login($user);

        return redirect("/");
    }
}
