<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bag;
use Illuminate\Http\Request;

class BagController extends Controller
{
    public function index()
    {
        $bags = Bag::all();
        return view('admin.bag.index', compact('bags'));
    }

    public function create()
    {
        return view('admin.bag.create');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s]+$/u'],
        ]);

        Bag::create(['name' => $request->name]);

        return redirect()->route('bags.index')->with('success', 'Bolsa creada exitosamente.');
    }

    public function edit(Bag $bag)
    {
        return view('admin.bag.edit', compact('bag'));
    }

    public function update(Request $request, Bag $bag)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s]+$/u'],
        ]);

        $bag->update(['name' => $request->name]);

        return redirect()->route('bags.index')->with('success', 'Bolsa actualizada exitosamente.');
    }

    public function destroy(Bag $bag)
    {
        $bag->delete();

        return redirect()->route('bags.index')->with('success', 'Bolsa eliminada exitosamente.');
    }
}
