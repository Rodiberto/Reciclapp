<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $users = User::where('rol_id', 2)->take(3)->get();
        $materials = Material::take(3)->get();

        $rolesData = User::selectRaw('roles.name as role_name, COUNT(users.id) as total')
            ->join('roles', 'users.rol_id', '=', 'roles.id')
            ->groupBy('roles.name')
            ->get();
        $rolesData->transform(function ($item) {
            switch ($item->role_name) {
                case 'admin':
                    $item->role_name = 'Administrador';
                    break;
                case 'collector':
                    $item->role_name = 'Recolector';
                    break;
                case 'standard_user':
                    $item->role_name = 'Usuario Normal';
                    break;
            }
            return $item;
        });

        return view('admin.dashboard', compact('users', 'materials', 'rolesData'));
    }
}
