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
        $role = $request->role;

        Auth::guard('masyarakat')->logout();
        Auth::guard('petugas')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($role == 'Masyarakat') {
            if (Auth::guard('masyarakat')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('dashboard'); // INI DEFAULT UNTUK MASYRAKAT LE
            }
        } else {
            if (Auth::guard('petugas')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('dashboardAdmin'); // TINGGAL UBAH ROUTE KALO ADMIN/PETUGAS MAU KE ARAH MANA
            }
        }

        return back()->withErrors(['login' => 'Username atau password salah.']);
    }



    public function logout(Request $request)
    {
        Auth::guard('masyarakat')->logout();
        Auth::guard('petugas')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    //     protected function authenticated(Request $request, $user)
    // {
    //     if ($user->role === 'admin') {
    //         return redirect()->route('admin.dashboard');
    //     }
    //     return redirect()->route('dashboard');
    // }

}
