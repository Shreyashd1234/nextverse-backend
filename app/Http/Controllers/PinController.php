<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PinController extends Controller
{
    public function showPin(Request $request)
    {
        if ($request->user()->role !== 'admin') {
            return redirect('/dashboard');
        }

        return view('auth.pin');
    }

    public function verifyPin(Request $request)
    {
        if ($request->user()->role !== 'admin') {
            return redirect('/dashboard');
        }

        $validated = $request->validate([
            'pin' => ['required', 'regex:/^\d{4}$/'],
        ]);

        if ((string) $validated['pin'] === (string) $request->user()->admin_pin) {
            $request->session()->put('pin_verified', true);

            return redirect('/dashboard');
        }

        return back()->withErrors(['pin' => 'Incorrect PIN.']);
    }
}

