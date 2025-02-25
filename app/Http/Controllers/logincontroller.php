<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Tambahkan ini!
use Illuminate\Support\Facades\Session;
use App\Models\Masyarakat;
use App\Models\Petugas;

class logincontroller extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cek login sebagai masyarakat
        $masyarakat = Masyarakat::where('username', $request->username)->first();
        if ($masyarakat && Hash::check($request->password, $masyarakat->password)) {
            Session::put('user', [
                'id' => $masyarakat->id,
                'username' => $masyarakat->username,
                'role' => 'masyarakat'
            ]);

            return redirect()->route('dashboard');
        }

        // Cek login sebagai petugas
        $petugas = Petugas::where('username', $request->username)
                          ->orWhere('nama_petugas', $request->username)
                          ->first();
        if ($petugas && Hash::check($request->password, $petugas->password)) {
            $role = ($petugas->id_level == 1) ? 'administrator' : 'petugas';

            Session::put('user', [
                'id' => $petugas->id_petugas,
                'username' => $petugas->username,
                'role' => $role
            ]);

            return redirect()->route("dashboard$role");
        }

        // Jika login gagal
        return redirect()->back()->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
}
