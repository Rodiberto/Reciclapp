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
        $adminRole = Role::where('nombre', 'admin')->firstOrFail()->id;

        User::create([
            'name' => 'Rodiber',
            'email' => 'rodibertocm@gmail.com',
            'password' => bcrypt('12345678'),
            'rol_id' => $adminRole,
        ]);
    }
}
