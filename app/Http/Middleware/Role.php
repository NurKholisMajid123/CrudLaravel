<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Role
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check()) {
            if (Auth::user()->role === $role) {
                return $next($request);
            } else {
                return redirect('/dashboard'); // Atau URL lain yang sesuai
            }
        }

        return redirect('/login'); // Atau URL login Anda
    }
}
