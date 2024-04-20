@extends('template.admin.main')

@section('content')
    <h1>Add New Address</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('addresses.store') }}" method="POST">
        @csrf

        <label for="user_id">User ID:</label>
        <input type="text" name="user_id" id="user_id" value="{{ $user->id }}" readonly>

        <label for="lokasi">Lokasi:</label>
        <input type="text" name="lokasi" id="lokasi" required>

        <label for="branch">Branch:</label>
        <input type="text" name="branch" id="branch" required>

        <button type="submit">Submit</button>
    </form>
@endsection
