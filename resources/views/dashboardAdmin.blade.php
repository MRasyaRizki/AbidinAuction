@extends('layouts.app')

@section('content')
<h1>Dashboard Admin</h1>
<p>Selamat datang, {{ $user->nama_petugas }}!</p>
<a href="{{ route('logout') }}">Logout</a>
@endsection
