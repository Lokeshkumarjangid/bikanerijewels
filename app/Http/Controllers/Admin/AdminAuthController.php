<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'admin'
        ], $request->remember)) {

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials'
        ]);
    }
    
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
            ->with('success', 'Logged out successfully.');
    }
}
