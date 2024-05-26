<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class AdminSeeder extends Seeder
{

    public function run(): void
    {
        // Obtener el ID del rol de administrador
        $adminRole = Role::where('nombre', 'admin')->firstOrFail()->id;

        // Crear el usuario administrador
        User::create([
            'name' => 'Rodiber',
            'email' => 'rodivercruzmorales@gmail.com',
            'password' => bcrypt('12345678'),
            'rol_id' => $adminRole, // Asignar el rol de administrador
        ]);
    }
}
