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
            'name' => 'admin',
            'description' => 'Administrador del sistema',
        ]);

        Role::create([
            'name' => 'collector',
            'description' => 'Recolector de materiales reciclables',
        ]);

        Role::create([
            'name' => 'standard_user',
            'description' => 'Usuario estándar',
        ]);
    }
}
