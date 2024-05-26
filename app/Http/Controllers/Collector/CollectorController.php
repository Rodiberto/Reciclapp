<?php

namespace App\Http\Controllers\Collector;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollectorController extends Controller
{
    public function index()
    {
        return view('collector.dashboard');
    }
}
