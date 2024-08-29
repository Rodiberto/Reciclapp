<?php

namespace App\Http\Controllers\StandarUser;

use App\Http\Controllers\Controller;
use App\Models\Container;
use App\Models\Requests;
use Illuminate\Http\Request;

class ContainerController extends Controller
{

    public function index()
    {
        $userId = auth()->id();

        $requests = Requests::where('user_id', $userId)->get();
    
        $containers = Container::whereIn('requests_id', $requests->pluck('id'))->get();
        $hasContainers = $containers->isNotEmpty();
    
        return view('standard_user.container.index', compact('containers', 'hasContainers'));
    }
    




    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
