<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'docente']);
        Role::firstOrCreate(['name' => 'alumno']);

        $admin = User::firstOrCreate(
            ['email' => 'admin@instituto.test'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('Admin12345*'),
            ]
        );

        $admin->assignRole('admin');
    }
}
