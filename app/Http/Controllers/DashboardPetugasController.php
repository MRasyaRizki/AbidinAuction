<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardPetugasController extends Controller
{
    public function index()
    {
        if (!Auth::guard('petugas')->check() || Auth::guard('petugas')->user()->id_level != 2) {
            return redirect()->route('login')->withErrors(['akses' => 'Anda tidak memiliki izin akses!']);
        }

        return view('dashboardPetugas', [
            'user' => Auth::guard('petugas')->user()
        ]);
    }
}
