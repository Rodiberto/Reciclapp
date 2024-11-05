<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\MaterialCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator;


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

        // dd($request->all());

        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s]+$/u'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5120'],
            'description' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s.,\-]+$/u',],
            'material_category_id' => ['required', 'exists:material_categories,id'],
            'weight' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'value' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'code' => ['required'],
        ]);


        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(base_path('../material_image'), $imageName);
            $data['image'] = '/material_image/' . $imageName;
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
            'name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s]+$/u'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5120'],
            'description' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s.,\-]+$/u',],
            'material_category_id' => ['required', 'exists:material_categories,id'],
            'weight' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'value' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'code' => ['required', 'string', 'max:20', 'unique:materials', 'regex:/^[a-zA-Z0-9]+$/',],
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($material->image) {
                $oldImagePath = base_path('../material_image/' . basename($material->image));
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(base_path('../material_image'), $imageName);

            $data['image'] = '/material_image/' . $imageName;
        } else {
            $data['image'] = $material->image;
        }

        $material->update($data);


        return redirect()->route('materials.index')->with('success', 'Material actualizado exitosamente.');
    }


    public function destroy(Material $material)
    {

        if ($material->elements()->count() > 0) {
            return redirect()->route('materials.index')
                ->with('error', 'No se puede eliminar el material porque está asociado a elementos.');
        }

        if ($material->image) {
            $imagePath = base_path('../material_image/' . basename($material->image));
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $material->delete();

        return redirect()->route('materials.index')->with('success', 'Material eliminado exitosamente.');
    }
}
