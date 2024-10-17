<?php

namespace App\Http\Controllers;

use App\Models\MaterialCategory;
use Illuminate\Http\Request;

class MaterialCategoryController extends Controller
{
    public function index()
    {
        $categories = MaterialCategory::all();
        $categories = MaterialCategory::orderBy('id', 'asc')->get();
        return view('material_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('material_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s]+$/u'],
            'description' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s.,\-]+$/u',],
        ]);

        MaterialCategory::create($request->all());

        return redirect()->route('material_categories.index')->with('success', 'Categoría creada exitosamente.');
    }

    public function edit(MaterialCategory $material_category)
    {
        return view('material_categories.edit', compact('material_category'));
    }

    public function update(Request $request, MaterialCategory $material_category)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s]+$/u'],
            'description' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s.,\-]+$/u',],
        ]);

        $material_category->update($request->all());

        return redirect()->route('material_categories.index')->with('success', 'Categoría actualizada exitosamente.');
    }

    public function destroy(MaterialCategory $material_category)
    {
        if ($material_category->materials()->count() > 0) {
            return redirect()->route('material_categories.index')->with('error', 'No se puede eliminar la categoría porque tiene materiales asociados.');
        }

        $material_category->delete();

        return redirect()->route('material_categories.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}
