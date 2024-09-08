<?php

namespace App\Http\Controllers\Collector;

use App\Http\Controllers\Controller;
use App\Models\Bag;
use App\Models\Requests;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectorController extends Controller
{
    public function index(Request $request)
    {
        $collectorId = Auth::id();


        $requests = Requests::where('user_id', $collectorId)
            ->latest()
            ->limit(3) 
            ->get()
            ->map(function ($request) {
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


        $history = Transaction::where('user_id', $collectorId)
            ->latest('transaction_date')
            ->limit(3)
            ->get()
            ->map(function ($transaction) {
                return [
                    'request_code' => $transaction->material->name ?? 'N/A',
                    'date' => $transaction->transaction_date->format('d/m/Y H:i:s'),
                    'weight' => $transaction->quantity,
                ];
            });



        $interval = $request->input('interval', 'week');

        if ($interval === 'week') {
            $startDate = Carbon::now()->subWeek()->startOfWeek();
            $endDate = Carbon::now()->endOfWeek();
        } else {
            $startDate = Carbon::now()->subMonth()->startOfMonth();
            $endDate = Carbon::now()->endOfMonth();
        }

        // Obtener la cantidad de bolsas recogidas por el recolector en el intervalo seleccionado
        $bagData = Bag::join('container', 'bag.container_id', '=', 'container.id')
            ->join('requests', 'container.requests_id', '=', 'requests.id')
            ->join('element', 'bag.id', '=', 'element.bag_id') // Unir con la tabla element
            ->where('requests.user_id', $collectorId) // Filtra por el ID del recolector
            ->whereBetween('requests.scheduled_date', [$startDate, $endDate]) // Rango de fechas
            ->groupBy('element.material_type') // Agrupar por el tipo de material en element
            ->selectRaw('element.material_type as material, COUNT(DISTINCT bag.id) as total_bags') // Conteo de bolsas
            ->get();

        $materialTypes = $bagData->pluck('material')->toArray();
        $bagCounts = $bagData->pluck('total_bags')->toArray();

        return view('collector.dashboard', compact('requests', 'history', 'materialTypes', 'bagCounts', 'interval'));
    }
}
