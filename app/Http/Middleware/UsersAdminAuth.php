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
class UsersAdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::guard("users_admin")->user()){
            return redirect()->route("admin.login");
        }

        return $next($request);
    }
}
