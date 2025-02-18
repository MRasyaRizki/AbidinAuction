<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:25',
            'username' => 'required|string|max:25|unique:tb_masyarakat,username',
            'telp' => 'required|string|max:25',
            'password' => 'required|string|min:6|confirmed',
        ]);

        Masyarakat::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'telp' => $request->telp,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
