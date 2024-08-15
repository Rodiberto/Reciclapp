<?php

namespace App\Http\Controllers;

use App\Models\Material;
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
}
