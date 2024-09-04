<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$role)
    {
        $user = Auth::user();

        if ($user && in_array($user->role, $role)) {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'Access denied');
    }
}

