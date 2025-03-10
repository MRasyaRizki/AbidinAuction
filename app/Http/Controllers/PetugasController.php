<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function manage()
    {
        return view('test.managePetugas', [
            'petugas' => Petugas::all()
        ]);
    }

    public function create()
    {
        return view('test.createPetugas', [
            'level' => Level::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required'
        ]);

        $petugas = new Petugas();
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->username = $request->username;
        $petugas->password = Hash::make($request->password);
        $petugas->id_level = $request->level;
        $petugas->save();
        return redirect()->route('managePetugas');
    }

    public function edit(Petugas $petugas)
    {
        return view('test.editPetugas', [
            'level' => Level::all(),
            'petugas' => $petugas
        ]);
    }

    public function update(Petugas $petugas, Request $request)
    {
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'nullable',
            'level' => 'required'
        ]);

        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->username = $request->username;
        if ($request->password != null) {
            $petugas->password = Hash::make($request->password);
        }
        $petugas->id_level = $request->level;
        $petugas->save();
        return redirect()->route('managePetugas');
    }

    public function destroy(Petugas $petugas)
    {
        $petugas->delete();
        return back();
    }
}
