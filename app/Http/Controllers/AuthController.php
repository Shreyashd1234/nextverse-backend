<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();

        if (! $user->is_active) {
            Auth::logout();

            return response()->json(['message' => 'Account disabled'], 403);
        }

        $request->session()->regenerate();

        return response()->json([
            'user' => Auth::user(),
        ]);
    }

    public function logoutApi(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logged out successfully']);
    }

    public function meApi(Request $request)
    {
        $user = $request->user();

        if (! $user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        return response()->json(['user' => $user]);
    }

    public function dashboard(Request $request)
    {
        $user = $request->user();

        if ($user->role === 'admin' && ! $request->session()->get('pin_verified', false)) {
            return redirect('/verify-pin');
        }

        return view('dashboard', ['user' => $user]);
    }
}

