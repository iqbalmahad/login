@extends('template.admin.main')

@section('content')
    <h1>Edit Address</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('addresses.update', $address->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="user_id" class="form-label">User ID:</label>
            <input type="text" name="user_id" id="user_id" value="{{ $address->user_id }}" readonly>
        </div>

        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi:</label>
            <input type="text" name="lokasi" id="lokasi" value="{{ $address->lokasi }}" required>
        </div>

        <div class="mb-3">
            <label for="branch" class="form-label">Branch:</label>
            <input type="text" name="branch" id="branch" value="{{ $address->branch }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Address</button>
    </form>
@endsection
