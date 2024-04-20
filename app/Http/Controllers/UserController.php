<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('address')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $address = $user->address;

        // Jika address null, arahkan ke halaman create address
        if ($address === null) {
            return redirect()->route('addresses.create')->with('warning', 'Alamat pengguna belum tersedia. Harap tambahkan alamat terlebih dahulu.');
        }

        return view('users.show', compact('user', 'address'));
    }

    public function showProfile()
    {
        $user = Auth::user();
        $address = $user->address;
        if ($address === null) {
            return redirect()->route('dashboard')->with('alamatKosong', 'Kamu belum memiliki alamat, minta admin membuatkan');
        }
        if ($user->hasRole('admin')) {
            return view('users.profile-admin', compact('user', 'address'));
        } elseif ($user->hasRole('user')) {
            return view('users.profile-user', compact('user', 'address'));
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|string|min:8',
        ]);

        if ($request->has('password')) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        // Periksa relasi dengan tabel teachers
        if ($user->address()->exists()) {
            $user->address()->delete(); // Hapus data di tabel teachers jika ada relasi
        }
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
