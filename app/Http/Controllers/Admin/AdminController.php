<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // Obtener la cantidad total reciclada de cada tipo de material
        $totalMaterialsData = DB::table('element')
            ->select('material_type', DB::raw('SUM(amount) as total_amount'))
            ->groupBy('material_type')
            ->get();

        // Obtener la cantidad de materiales recolectados por usuarios recolectores
        $userMaterialsData = DB::table('users')
            ->where('users.rol_id', 2) // Solo recolectores
            ->join('requests', 'users.id', '=', 'requests.user_id')
            ->join('container', 'requests.id', '=', 'container.requests_id')
            ->join('bag', 'container.id', '=', 'bag.container_id')
            ->join('element', 'bag.id', '=', 'element.bag_id')
            ->select('users.id as user_id', 'users.name as user_name', 'bag.id as bag_id', DB::raw('SUM(element.amount) as total_amount'))
            ->groupBy('users.id', 'users.name', 'bag.id')
            ->get();

        return view('admin.dashboard', compact('users', 'materials', 'rolesData', 'totalMaterialsData', 'userMaterialsData'));
    }
}
