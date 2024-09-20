<?php

namespace App\Http\Controllers;

use App\Models\Bag;
use App\Models\Material;
use App\Models\Requests;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    public function generateReport()
    {
        $materials = Material::all();

        $pdf = Pdf::loadView('reports.materials', compact('materials'));

        return $pdf->download('Materiales.pdf');
    }

    public function UserReport(){
        $users = User::all();

        $pdf = Pdf::loadView('reports.users', compact('users'));

        return $pdf->download('Usuarios.pdf');
    }

    public function standardUser(){
        $requests = Requests::all();

        $pdf = Pdf::loadView('reports.solicitud_user_standard', compact('requests'));

        return $pdf->download('Solicitudes.pdf');
    }

    public function collectorUser(){
        $collectorId = Auth::id();
        $requests = Requests::where('user_id', $collectorId) 
            ->get()
            ->map(function ($request) {
                $totalWeight = Bag::join('container', 'bag.container_id', '=', 'container.id')
                    ->join('element', 'bag.id', '=', 'element.bag_id')
                    ->where('container.requests_id', $request->id)
                    ->sum('element.amount');

                return [
                    'code' => $request->code,
                    'status' => $request->status,
                    'total_weight' => $totalWeight
                ];
            });

        $pdf = Pdf::loadView('reports.request_collector', compact('requests'));

        return $pdf->download('Solicitudes-recolector.pdf');
    }
}
