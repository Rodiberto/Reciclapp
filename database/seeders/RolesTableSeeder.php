<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Role::create([
            'nombre' => 'admin',
            'descripcion' => 'Administrador del sistema',
        ]);

        Role::create([
            'nombre' => 'collector',
            'descripcion' => 'Recolector de materiales reciclables',
        ]);

        Role::create([
            'nombre' => 'standard_user',
            'descripcion' => 'Usuario estándar',
        ]);
    }
}
