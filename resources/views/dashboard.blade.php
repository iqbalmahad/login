@if (Auth::user()->hasRole('admin'))
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome to Admin Dashboard</h1>
    <h2>Halo, {{ Auth::user()->name }}</h2>
    <h3>Peran Anda: Admin</h3>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
@endif

@if (Auth::user()->hasRole('user'))
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
    <h1>Welcome to User Dashboard</h1>
    <h2>Halo, {{ Auth::user()->name }}</h2>
    <h3>Peran Anda: User</h3>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
@endif