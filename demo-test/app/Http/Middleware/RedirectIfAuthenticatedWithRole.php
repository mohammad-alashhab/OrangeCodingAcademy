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

            if ($userRole === 2 || $userRole === 1) { // Admin Role
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
                    !$request->routeIs('bookings.*') &&
                    !$request->routeIs('services.*') &&
                    !$request->routeIs('contacts.*') &&
                    !$request->routeIs('profile.*')
                ) {
                    return redirect()->route('dashboard');
                }
            }

            if ($userRole === 3) { // Customer Role
                // Allow only the welcome page
                if (!$request->routeIs('ecommerce*') &&
                !$request->routeIs('contact-us.*') &&
                !$request->routeIs('about-us.*') &&
                !$request->routeIs('cart.*') &&
                !$request->routeIs('checkout.*') &&
                !$request->routeIs('profile.*') &&
                !$request->routeIs('my-orders.*') &&
                !$request->routeIs('wishlist.*') &&
                !$request->routeIs('categories.*') &&
                !$request->routeIs('product-details.*') &&
                !$request->routeIs('shop.*') &&
                !$request->routeIs('faq.*') &&
                !$request->routeIs('privacy-policy.*') &&
                !$request->routeIs('reviews.*')
                ) {
                    return redirect()->route('ecommerce');
                }
            }
        }

        return $next($request);
    }
}
