<?php

namespace App\Http\Controllers\StandarUser;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $history = Transaction::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($transaction) {
                return [
                    'material' => $transaction->material->name,
                    'date' => $transaction->created_at->format('d/m/Y H:i:s'),
                    'weight' => $transaction->weight,
                ];
            });

        return view('standard_user.history.index', compact('history'));
    }
}
