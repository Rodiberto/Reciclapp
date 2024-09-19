<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvisoPrivacidadController extends Controller
{
    public function index(){
        return view('aviso_privacidad');
    }
}
