<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


/**
 * 
 *  Middleware similiar to 'auth' that check for authentication from users_admin
 * 
 */
class UsersFacultyAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::guard("users_faculty")->user()){
            return redirect()->route("faculty.login");
        }

        return $next($request);
    }
}
