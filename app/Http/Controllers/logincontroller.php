<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Masyarakat;
use App\Models\Petugas;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        // Coba login sebagai masyarakat
        if (Auth::guard('masyarakat')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        // Coba login sebagai petugas
        if (Auth::guard('petugas')->attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::guard('petugas')->user();

            // Redirect berdasarkan id_level
            if ($user->id_level == 1) {
                return redirect()->route('dashboardAdmin');
            } elseif ($user->id_level == 2) {
                return redirect()->route('dashboardPetugas');
            }
        }

        // Jika login gagal
        return back()->withErrors(['login' => 'Username atau password salah.']);
    }

    public function logout(Request $request)
    {
        if (Auth::guard('masyarakat')->check()) {
            Auth::guard('masyarakat')->logout();
        } elseif (Auth::guard('petugas')->check()) {
            Auth::guard('petugas')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
