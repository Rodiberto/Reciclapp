<?php

namespace App\Http\Controllers;

use App\Models\CollectionPoint;
use App\Models\Material;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CollectionPointController extends Controller
{

    public function index()
    {
        $collectionPoints = CollectionPoint::all();
        return view('collection_points.index', compact('collectionPoints'));
    }

    public function create()
    {
        $materials = Material::all();
        return view('collection_points.create', compact('materials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'schedule' => 'nullable|string',
            'materials' => 'required|array',
        ]);

        $collectionPoint = CollectionPoint::create([
            'name' => $request->name,
            'address' => $request->address,
            'schedule' => $request->schedule,
        ]);

        foreach ($request->materials as $materialId) {
            $collectionPoint->materials()->attach($materialId);
        }
    
        return redirect()->route('collection_points.index')
            ->with('success', 'Punto de recolección creado exitosamente.');
    }
    
    public function show(CollectionPoint $collectionPoint)
    {
        return view('collection_points.show', compact('collectionPoint'));
    }

    public function edit(CollectionPoint $collectionPoint)
    {
        return view('collection_points.edit', compact('collectionPoint'));
    }

    public function update(Request $request, CollectionPoint $collectionPoint)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'schedule' => 'nullable|string',
            'materials' => 'required|array',
        ]);

        $collectionPoint->update($request->all());

        return redirect()->route('collection_points.index')
            ->with('success', 'Punto de recolección actualizado exitosamente.');
    }

    public function destroy(CollectionPoint $collectionPoint)
    {
        $transactionsCount = Transaction::where('collection_point_id', $collectionPoint->id)->count();

        if ($transactionsCount > 0) {
            return redirect()->route('collection_points.index')
                ->with('error', 'No se puede eliminar este punto de recolección porque tiene transacciones asociadas.');
        }

        $collectionPoint->delete();

        return redirect()->route('collection_points.index')
            ->with('success', 'Punto de recolección eliminado exitosamente.');
    }
}
