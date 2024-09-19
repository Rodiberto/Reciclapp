<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Requests;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

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
}
