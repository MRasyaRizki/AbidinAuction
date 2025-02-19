<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::guard('masyarakat')->check()) {
            return redirect()->route('login')->withErrors(['akses' => 'Anda tidak memiliki izin akses!']);
        }

        return view('dashboard', [
            'user' => Auth::guard('masyarakat')->user()
        ]);
    }
}
