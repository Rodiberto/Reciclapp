<?php

namespace App\Http\Controllers\StandarUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StandarUserController extends Controller
{
    public function index()
    {
        return view('standard_user.dashboard');
    }
}
