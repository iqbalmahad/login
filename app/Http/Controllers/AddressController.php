<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function create($id)
    {
        $user = User::where('id', $id)->first();
        if ($user->address()->exists()) {
            return redirect()->route('users.index')->with('exists', 'Tidak dapat membuat alamat lebih dari 1');
        }
        return view('addresses.create', compact('user'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'lokasi' => 'required|string',
            'branch' => 'required|string',
        ]);

        Address::create($validatedData);

        return redirect()->route('users.index')->with('success', 'Address created successfully.');
    }

    public function show(Address $address)
    {
        return view('addresses.show', compact('address'));
    }

    public function edit(Address $address)
    {
        return view('addresses.edit', compact('address'));
    }


    public function update(Request $request, Address $address)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'lokasi' => 'required|string',
            'branch' => 'required|string',
        ]);

        $address->update($validatedData);

        return redirect()->route('users.index')->with('success', 'Address updated successfully.');
    }

    public function destroy(Address $address)
    {
        $address->delete();

        return redirect()->route('users.index')->with('success', 'Address deleted successfully.');
    }
}
