<?php

namespace App\Http\Middleware;

use Closure;

class Authenticate
{
    public function handle($request, Closure $next, $role)
    {
        if (auth($role)->check()) {
            return $next($request);
        }

        return redirect()->route($role == "admin" ? "loginAdmin" : "loginCustomer");
    }
}
