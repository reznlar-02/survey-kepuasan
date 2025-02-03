<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{
        // public function authenticated(Request $request, $user)
        // {
        //     // Periksa jika user adalah admin
        //     if ($user->is_admin) {
        //         return redirect()->route('admin.dashboard');
        //     }
    
        //     // Jika bukan admin, arahkan ke halaman CAT
        //     return redirect()->route('pertanyaan');
        // }
    
        public function showLoginForm()
        {
            // return view('auth.login');
            return view('admin/login'//, [
                // 'title' => 'Login',
                // 'active' => 'Login'
            //]
        );
        }

//         public function login(Request $request)
// {
//     // Validasi input dari form
//     $request->validate([
//         'email' => 'required|email:dns',
//         'password' => 'required|min:6',
//     ]);

//     // Coba autentikasi pengguna
//     $credentials = $request->only('email', 'password');
//     if (Auth::attempt($credentials)) {
//         // Ambil peran pengguna yang login
//         $user = Auth::user();
        
//         // Cek role pengguna dan arahkan sesuai role-nya
//         if ($user->role == 'admin') {
//             return redirect()->route('management'); // Halaman manajemen web untuk admin
//         } elseif ($user->role == 'komandan') {
//             return redirect()->route('survey_results'); // Halaman hasil survey untuk komandan
//         }

//         return redirect()->intended('/dashboard');

//         // Jika role tidak dikenali, redirect ke halaman default
//         return redirect()->route('home');
//     }

//     // Jika login gagal, kembali ke halaman login dengan pesan error
//     return back()->withErrors(['email' => 'Email atau password salah']);
// }
//     }    

public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ] );

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // return redirect()->intended('/dashboard');
            return redirect()->route('admin.dashboard');
        }

        return back()->with('loginError', 'Login Failed');
    }
}