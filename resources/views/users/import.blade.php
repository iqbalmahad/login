@extends('template.admin.main')

@section('content')
    <h1>Import Users</h1>
    <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Choose Excel File</label>
            <input type="file" class="form-control-file" id="file" name="file" accept=".xlsx, .xls" required>
        </div>
        <button type="submit" class="btn btn-primary">Import Users</button>
    </form>
@endsection
