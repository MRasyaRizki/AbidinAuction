<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    public function index()
    {
        if (!Auth::guard('petugas')->check() || Auth::guard('petugas')->user()->id_level != 1) {
            return redirect()->route('login')->withErrors(['akses' => 'Anda tidak memiliki izin akses!']);
        }

        return view('dashboardAdmin', [
            'user' => Auth::guard('petugas')->user()
        ]);
    }
}
