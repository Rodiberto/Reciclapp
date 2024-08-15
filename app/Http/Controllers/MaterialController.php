<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\MaterialCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'material_category_id' => 'required|exists:material_categories,id',
            'weight' => 'required|string|max:255',
            'value' => 'required|string|max:255',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imageMaterial = $request->file('image')->store('public/material_image');
            $data['image'] = '/storage/' . str_replace('public/', '', $imageMaterial);
        }

        Material::create($data);

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'material_category_id' => 'required|exists:material_categories,id',
            'weight' => 'required|string|max:255',
            'value' => 'required|string|max:255',
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('image')) {
            if ($material->image) {
                Storage::delete(str_replace('/storage/', 'public/', $material->image));
            }
    
            $imageMaterial = $request->file('image')->store('public/material_image');
            $data['image'] = '/storage/' . str_replace('public/', '', $imageMaterial);
        }
    
        $material->update($data);
    
        return redirect()->route('materials.index')->with('success', 'Material actualizado exitosamente.');
    }
    


    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('materials.index')->with('success', 'Material eliminado exitosamente.');
    }
}
