<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return view('reports.index', compact('reports'));
    }

    public function create()
    {
        $users = User::all();
        $materials = Material::all();
        return view('reports.create', compact('users', 'materials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'material_id' => 'required|exists:materials,id',
            'quantity' => 'required|integer|min:1',
            'report_date' => 'required|date',
        ]);

        Report::create($request->all());

        return redirect()->route('reports.index')
            ->with('success', 'Informe creado exitosamente.');
    }

    public function show(Report $report)
    {
        return view('reports.show', compact('report'));
    }
}
