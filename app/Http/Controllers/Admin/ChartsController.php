<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ChartsController extends Controller
{



    public function index()
    {
        // Obtener el total de usuarios por rol
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

        return view('admin.chart.index', compact('rolesData'));
    }


    // public function index()
    // {
    //     // Obtener el total de usuarios por rol
    //     $rolesData = User::selectRaw('roles.name as role_name, COUNT(users.id) as total')
    //         ->join('roles', 'users.rol_id', '=', 'roles.id')
    //         ->groupBy('roles.name')
    //         ->get();

    //     // Pasar los datos a la vista
    //     return view('admin.chart.index', compact('rolesData'));
    // }






    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
