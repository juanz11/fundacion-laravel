<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuario administrador por defecto
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@fundacion.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Crear usuario común de ejemplo
        User::create([
            'name' => 'Usuario Demo',
            'email' => 'usuario@fundacion.com',
            'password' => Hash::make('usuario123'),
            'role' => 'usuario',
        ]);
    }
}
