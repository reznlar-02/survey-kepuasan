<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view for admin to create Komandan account.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.create-komandan');  // View where the admin can create Komandan accounts
    }

    /**
     * Handle an incoming registration request to create a Komandan account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // Validation rules for creating a Komandan account
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Create Komandan user and assign role
        $komandan = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'komandan',  // Assuming you have a role column to identify the Komandan
        ]);

        // Optionally, you can log the Komandan in immediately after registration
        // Auth::login($komandan);

        // Fire the registered event for Komandan
        event(new Registered($komandan));

        // Redirect to the Komandan dashboard or another page
        return redirect()->route('admin.dashboard');  // Adjust to your desired route
    }
}