<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authenticate the user with "Remember Me"
        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $user = Auth::user();

            // Check if the user account is active
            if ($user->is_active == 0) {
                Auth::logout(); // Log out the inactive user
                return redirect()->route('login')->withErrors([
                    'account_blocked' => 'Your account is blocked. Please contact support.',
                ]);
            }

            // Store the email and encrypted password in cookies for pre-filling later, if "Remember Me" is checked
            if ($request->boolean('remember')) {
                Cookie::queue('remember_email', $request->email, 43200); // Store email for 30 days
                Cookie::queue('remember_password', Crypt::encryptString($request->password), 43200); // Encrypt and store password for 30 days
                Cookie::queue('remember_me', 'true', 43200); // Store the "Remember Me" state (checked)
            } else {
                // If the "Remember Me" checkbox is unchecked, clear the cookies
                Cookie::queue(Cookie::forget('remember_email'));
                Cookie::queue(Cookie::forget('remember_password'));
                Cookie::queue(Cookie::forget('remember_me'));
            }

            // Regenerate session if the account is active
            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        // If authentication fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
