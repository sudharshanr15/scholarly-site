<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\UserAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\ValidationException;

class UserAdminController extends Controller
{
    private string $guard = "users_admin";

    public function create()
    {
        return view("admin.login");
    }


    public function store(Request $request)
    {
        $attr = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"]
        ]);

        if (!Auth::guard($this->guard)->attempt($attr)){
            throw ValidationException::withMessages([
                "error" => "Sorry, these credentials do not match"
            ]);
        }
        
        $request->session()->regenerate();
        return redirect("/");
    }

    public function destroy(Request $request)
    {
        Auth::guard($this->guard)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect("/");
    }
}
