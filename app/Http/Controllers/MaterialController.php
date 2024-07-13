<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\MaterialCategory;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category');
        $view = $request->get('view', 'grid');
    
        if ($category) {
            $materials = Material::where('material_category_id', $category)->with('category')->get();
        } else {
            $materials = Material::with('category')->get();
        }
    
        $categories = MaterialCategory::all();
    
        return view('materials.index', compact('materials', 'view', 'categories'));
    }
    

    public function create()
    {
        $categories = MaterialCategory::all();
        return view('materials.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|max:255',
            'material_category_id' => 'required|exists:material_categories,id',
        ]);

        Material::create($request->all());

        return redirect()->route('materials.index')->with('success', 'Material creado exitosamente.');
    }

    public function edit(Material $material)
    {
        $categories = MaterialCategory::all();
        return view('materials.edit', compact('material', 'categories'));
    }

    public function update(Request $request, Material $material)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|max:255',
            'material_category_id' => 'required|exists:material_categories,id',
        ]);

        $material->update($request->all());

        return redirect()->route('materials.index')->with('success', 'Material actualizado exitosamente.');
    }

    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('materials.index')->with('success', 'Material eliminado exitosamente.');
    }
}
