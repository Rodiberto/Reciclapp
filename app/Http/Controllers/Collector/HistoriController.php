<?php

namespace App\Http\Controllers\Collector;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class HistoriController extends Controller
{
    public function index()
    {
        $collectorId = Auth::id();

        $history = Transaction::where('user_id', $collectorId)
            ->orderBy('transaction_date', 'desc')
            ->get()
            ->map(function ($transaction) {
                return [
                    'request_code' => $transaction->material->name ?? 'N/A',
                    'date' => $transaction->transaction_date->format('d/m/Y H:i:s'),
                    'weight' => $transaction->quantity,
                ];
            });

        return view('collector.history.index', compact('history'));
    }
}

