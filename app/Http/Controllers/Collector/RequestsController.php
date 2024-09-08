<?php

namespace App\Http\Controllers\Collector;

use App\Http\Controllers\Controller;
use App\Models\Requests;
use App\Models\Bag;
use App\Models\Element;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestsController extends Controller
{
    public function index()
    {
        $collectorId = Auth::id();
        $requests = Requests::where('user_id', $collectorId) 
            ->get()
            ->map(function ($request) {
                // Obtener el peso total de los materiales en kg
                $totalWeight = Bag::join('container', 'bag.container_id', '=', 'container.id')
                    ->join('element', 'bag.id', '=', 'element.bag_id')
                    ->where('container.requests_id', $request->id)
                    ->sum('element.amount');

                return [
                    'code' => $request->code,
                    'status' => $request->status,
                    'total_weight' => $totalWeight
                ];
            });

        return view('collector.request.index', compact('requests'));
    }

    public function show($id)
    {
        $request = Requests::findOrFail($id);
        $collectorId = Auth::id();

        if ($request->user_id !== $collectorId) {
            abort(403, 'Unauthorized access.');
        }

        $user = $request->user; // Obtener información del usuario

        return view('collector.request.show', compact('request', 'user'));
    }
}
