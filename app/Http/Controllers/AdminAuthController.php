<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
        // return view('admin/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ] );

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin.dashboard');
            // return redirect()->route('admin/dashboard');
        }

        return back()->with('loginError', 'Login Failed');

        // $credentials = $request->only('email', 'password');

        // if (Auth::guard('admin')->attempt($credentials)) {
        //     return redirect()->route('admin.dashboard'); // Redirect setelah login
        // }

        // return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function dashboard()
    {
        // return view('admin.dashboard'); // Tampilkan dashboard
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}