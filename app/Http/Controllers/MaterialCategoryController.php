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
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5120'],
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(base_path('../material_image'), $imageName);
            $data['image'] = '/material_image/' . $imageName;
        }

        MaterialCategory::create($data);

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
            'description' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s.,\-]+$/u'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5120'],
        ]);
        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($material_category->image) {
                $oldImagePath = base_path('../material_image/' . basename($material_category->image));
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(base_path('../material_image'), $imageName);

            $data['image'] = '/material_image/' . $imageName;
        } else {
            $data['image'] = $material_category->image;
        }

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
