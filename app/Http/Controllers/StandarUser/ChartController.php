<?php

namespace App\Http\Controllers\StandarUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Container;
use App\Models\Bag;
use App\Models\Requests;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();

        // Obtener el total de contenedores asociados al usuario actual
        $totalContainers = Container::whereIn('requests_id', Requests::where('user_id', $userId)->pluck('id'))->count();

        // Obtener el total de bolsas asociadas a los contenedores del usuario
        $totalBags = Bag::whereIn('container_id', Container::whereIn('requests_id', Requests::where('user_id', $userId)->pluck('id'))->pluck('id'))->count();

        // Pasar los totales a la vista
        return view('standard_user.chart.index', compact('totalContainers', 'totalBags'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
