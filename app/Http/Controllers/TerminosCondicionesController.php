<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TerminosCondicionesController extends Controller
{
    public function index(){
        return view('terminos_condiciones');
    }
}
