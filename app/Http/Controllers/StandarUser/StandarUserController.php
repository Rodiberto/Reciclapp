<?php

namespace App\Http\Controllers\StandarUser;

use App\Http\Controllers\Controller;
use App\Models\Container;
use App\Models\Element;
use App\Models\Requests;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StandarUserController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        $requests = Requests::where('user_id', $userId)->take(3)->get();

        $history = Transaction::where('user_id', $userId)
            ->orderBy('transaction_date', 'desc')
            ->take(3)
            ->get()
            ->map(function ($transaction) {
                return [
                    'material' => $transaction->material->name,
                    'date' => $transaction->transaction_date,
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

        // Obtener la cantidad reciclada por el usuario en el intervalo seleccionado
        $recycledData = Element::join('bag', 'element.bag_id', '=', 'bag.id')
            ->join('container', 'bag.container_id', '=', 'container.id')
            ->join('requests', 'container.requests_id', '=', 'requests.id')
            ->where('requests.user_id', $userId) // Filtra por el ID del usuario
            ->whereBetween('requests.scheduled_date', [$startDate, $endDate]) // Rango de fechas
            ->groupBy('element.materials_name')
            ->selectRaw('element.materials_name, SUM(element.amount) as total_amount')
            ->get();

        $materials = $recycledData->pluck('materials_name')->toArray();
        $quantities = $recycledData->pluck('total_amount')->toArray();

        return view('standard_user.dashboard', compact('requests', 'history', 'materials', 'quantities', 'interval'));
    }
}

