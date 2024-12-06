<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticatedWithRole
{

public function handle(Request $request, Closure $next){
    if (Auth::check()) {$userRole = Auth::user()->role;

            // Prevent redirection loop
            if ($request->isMethod('get')) {
                if ($userRole === 'admin' && !$request->routeIs('admin.dashboard')) {
                    return redirect()->route('admin.dashboard');
                }

                if ($userRole === 'user' && !$request->routeIs('home')) {
                    return redirect()->route('home');
                }
            }
        }

        return $next($request);
    }
}