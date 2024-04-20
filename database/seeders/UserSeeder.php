<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        // Buat user admin
        $admin = User::create([
            'name' => 'Admin User',
            'nik' => 1234567890, // Isi sesuai kebutuhan
            'password' => 'password', // Ganti 'password' dengan password yang diinginkan
        ]);
        $adminRole = Role::where('name', 'admin')->first();
        $admin->assignRole($adminRole);


        // Buat 10 user dengan role user
        for ($i = 1; $i <= 10; $i++) {
            $user = User::create([
                'name' => 'User ' . $i,
                'nik' => 1000000000 + $i, // Contoh penambahan nilai untuk nik
                'password' => 'password', // Ganti 'password' dengan password yang diinginkan
            ]);

            $userRole = Role::where('name', 'user')->first();
            $user->assignRole($userRole);
        }
    }
}
