<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedWithRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the user is active
            if (!$user->is_active) {
                Auth::logout(); // Log out the inactive user
                return redirect()->route('login')->withErrors([
                    'account_inactive' => 'Your account is inactive. Please contact support.',
                ]);
            }

            // Check the user role and restrict routes accordingly
            $userRole = $user->role_id;

            if ($userRole === 2) { // Admin Role
                // Allow only admin routes
                if (
                    !$request->routeIs('dashboard*') &&
                    !$request->routeIs('users.*') &&
                    !$request->routeIs('orders.*') &&
                    !$request->routeIs('products.*') &&
                    !$request->routeIs('categories.*') &&
                    !$request->routeIs('brands.*') &&
                    !$request->routeIs('discounts.*') &&
                    !$request->routeIs('coupons.*') &&
                    !$request->routeIs('reviews.*') &&
                    !$request->routeIs('profile.*')
                ) {
                    return redirect()->route('dashboard');
                }
            }

            if ($userRole === 3) { // Normal User Role
                // Allow only the welcome page
                if (!$request->routeIs('welcome')) {
                    return redirect()->route('welcome');
                }
            }
        }

        return $next($request);
    }
}
