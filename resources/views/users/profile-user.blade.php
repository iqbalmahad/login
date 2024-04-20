@extends('template.user.main')

@section('content')
    <h1>User Details</h1>

    <div>
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Nik:</strong> {{ $user->nik }}</p>
        <p><strong>Address:</strong></p>
        <p>{{ $address->lokasi }}</p>
        <p>{{ $address->branch }}</p>
    </div> 

    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Kembali ke Dashboard</a>
@endsection
