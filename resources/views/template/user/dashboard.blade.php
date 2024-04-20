@extends('template.user.main')

@section('content')
        @if (session('alamatKosong'))
        <div class="alert alert-danger">{{ session('alamatKosong') }}</div>
        @endif
    <h1 class="mt-3">Welcome to User Dashboard</h1>
    <h2>Halo, {{ Auth::user()->name }}</h2>
    <h3>Peran Anda: User</h3>

    <a href="{{ route('users.profile') }}" class="btn btn-primary mt-3">Lihat Profile</a>

    <form action="{{ route('logout') }}" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
@endsection
