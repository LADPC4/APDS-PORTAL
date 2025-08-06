<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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
        // $request->authenticate();

        // $request->session()->regenerate();

        // return redirect()->intended(route('dashboard', absolute: false));
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (! Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            return back()->withErrors([
                'email' => trans('auth.failed'),
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        $user = Auth::user();

        // dd([
        //     'email' => $user->email,
        //     'usertype' => $user->usertype,
        //     'redirect' => $user->usertype === 'admin' ? '/admin' : ($user->usertype === 'user' ? '/user' : '/'),
        // ]);

        // if ($user->usertype === 'admin') {
        //     return redirect()->intended('/admin');
        // }

        // if ($user->usertype === 'user' || is_null($user->usertype)) {
        //     return redirect()->intended('/user');
        // }

        // return redirect('/');

        // Redirect based on usertype
        return match ($user->usertype) {
            'admin' => redirect()->intended('/admin'),
            'user', null => redirect()->intended('/user'),
            default => redirect('/'),
        };
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
