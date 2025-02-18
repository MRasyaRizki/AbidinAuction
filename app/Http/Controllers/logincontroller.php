<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Masyarakat;
use App\Models\Petugas;
use App\Models\Level;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Cek Masyarakat
        $masyarakat = Masyarakat::where('username', $request->username)->first();
        if ($masyarakat && $request->password === $masyarakat->password) {
            // Simpan session sebagai masyarakat
            session(['user' => $masyarakat, 'role' => 'masyarakat']);
            return redirect()->route('home');
        }

        // Cek Petugas
        $petugas = Petugas::where('username', $request->username)->first();
        if ($petugas && $request->password === $petugas->password) {
            // Simpan session dengan role sesuai level
            $role = $petugas->id_level == 1 ? 'petugas' : 'admin';
            session(['user' => $petugas, 'role' => $role]);
            return redirect()->route('home');
        }

        return back()->withErrors(['login' => 'Username atau password salah.']);
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
