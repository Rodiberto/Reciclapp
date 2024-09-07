<?php

namespace App\Http\Controllers\StandarUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Element;
use Carbon\Carbon;

class ChartController extends Controller
{

    public function index(Request $request)
    {
        $userId = auth()->id();
        $interval = $request->input('interval', 'week'); // 'week' o 'month'

        if ($interval === 'week') {
            // Obtener la fecha actual y calcular la fecha de una semana atrás
            $startDate = Carbon::now()->subWeek()->startOfWeek(); // Inicio de la semana
            $endDate = Carbon::now()->endOfWeek(); // Fin de la semana
        } else {
            // Obtener la fecha actual y calcular la fecha de un mes atrás
            $startDate = Carbon::now()->subMonth()->startOfMonth(); // Inicio del mes
            $endDate = Carbon::now()->endOfMonth(); // Fin del mes
        }

        // Obtener la cantidad reciclada por el usuario en el intervalo seleccionado
        $recycledData = Element::join('bag', 'element.bag_id', '=', 'bag.id')
            ->join('container', 'bag.container_id', '=', 'container.id')
            ->join('requests', 'container.requests_id', '=', 'requests.id')
            ->join('users', 'requests.user_id', '=', 'users.id')
            ->where('users.id', $userId) // Filtra por el ID del usuario
            ->whereBetween('requests.scheduled_date', [$startDate, $endDate]) // Rango de fechas
            ->groupBy('element.materials_name')
            ->selectRaw('element.materials_name, SUM(element.amount) as total_amount')
            ->get();

        $materials = $recycledData->pluck('materials_name')->toArray(); // Corregido
        $quantities = $recycledData->pluck('total_amount')->toArray();

        return view('standard_user.chart.index', compact('materials', 'quantities', 'interval'));
    }

}
