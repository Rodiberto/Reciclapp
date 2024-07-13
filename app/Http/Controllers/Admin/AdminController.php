<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::take(3)->get();
        $materials = Material::take(3)->get();
        return view('admin.dashboard', compact('users', 'materials'));
    }
}
