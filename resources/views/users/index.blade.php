@extends('template.admin.main')

@section('content')
    <h1>User List</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add User</a>
    <a href="{{ route('users.import.form') }}" class="btn btn-success mb-3">Import Users</a> {{-- Tambahkan link import --}}

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('exists'))
        <div class="alert alert-danger">{{ session('exists') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Name</th>
                <th>Lokasi</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->nik }}</td>
                    <td>{{ $user->name }}</td>
                    @if ($user->address != null)
                    <td>{{ $user->address->lokasi }}, {{ $user->address->branch }}</td>
                    @else
                    <td><a href="{{ route('addresses.create', $user->id) }}">tambah alamat</a></td>
                    @endif
                    <td>
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                    @if (!$user->hasRole('admin'))
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
