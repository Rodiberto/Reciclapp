<?php

namespace App\Http\Controllers\StandarUser;

use App\Http\Controllers\Controller;
use App\Models\Container;
use App\Models\Requests;
use Illuminate\Http\Request;

class StandarUserController extends Controller
{
    // public function index()
    // {
    //     return view('standard_user.dashboard');
    // }

    public function index()
    {
        $userId = auth()->id();
        // Obtener las solicitudes del usuario actual
        $requests = Requests::where('user_id', $userId)->get();

        // Obtener los contenedores asociados a las solicitudes del usuario
        $containers = Container::whereIn('requests_id', $requests->pluck('id'))->take(3)->get();
        $hasContainers = $containers->isNotEmpty();

        return view('standard_user.dashboard', compact('containers', 'hasContainers'));
    }
}
