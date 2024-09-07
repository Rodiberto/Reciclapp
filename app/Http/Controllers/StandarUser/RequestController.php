<?php

namespace App\Http\Controllers\StandarUser;

use App\Http\Controllers\Controller;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index(){

        $userId = Auth::id();

        $requests = Requests::where('user_id', $userId)->get();

        return view('standard_user.request.index', compact('requests'));
    }
}
