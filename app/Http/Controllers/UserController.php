<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $role = $request->get('role');
        $view = $request->get('view', 'grid');

        if ($role) {
            $users = User::whereHas('role', function ($query) use ($role) {
                $query->where('name', $role);
            })->get();
        } else {
            $users = User::all();
        }

        return view('users.index', compact('users', 'view'));
    }


    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s]+$/u'],
            'phone' => ['required', 'regex:/^[0-9]{10}$/'],
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rol_id' => 'required|exists:roles,id',
        ]);

        $userData = $request->only(['name', 'phone', 'email', 'password', 'rol_id']);
        $userData['password'] = Hash::make($userData['password']);

        if ($request->hasFile('photo')) {
            $profilePhotoPath = $request->file('photo')->store('public/profile_photos');
            $userData['photo'] = '/storage/' . str_replace('public/', '', $profilePhotoPath);
        } else {
            $userData['photo'] = '/default/profile.png';
        }

        User::create($userData);

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s]+$/u'],
            'phone' => ['required', 'regex:/^[0-9]{10}$/'],
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $userData = $request->only(['name', 'email']);
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $profilePhotoPath = $request->file('photo')->store('public/profile_photos');
            $userData['photo'] = '/storage/' . str_replace('public/', '', $profilePhotoPath);
        } elseif (!$request->hasFile('photo') && !$user->photo) {
            $userData['photo'] = '/default/profile.png';
        }

        $user->update($userData);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $user)
    {
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
