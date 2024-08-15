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
                $query->where('nombre', $role);
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
            'name' => 'required|string|max:255',
            'phone' => ['required', 'numeric'],
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rol_id' => 'required|exists:roles,id',
        ]);

        $userData = $request->only(['name', 'phone', 'email', 'password', 'rol_id']);
        $userData['password'] = Hash::make($userData['password']);

        if ($request->hasFile('profile_photo_path')) {
            $profilePhotoPath = $request->file('profile_photo_path')->store('public/profile_photos');
            $userData['profile_photo_path'] = '/storage/' . str_replace('public/', '', $profilePhotoPath);
        } else {
            $userData['profile_photo_path'] = '/default/profile.png';
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
            'name' => 'required|string|max:255',
            'phone' => ['required', 'numeric'],
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $userData = $request->only(['name', 'email']);
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('profile_photo_path')) {
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }
            $profilePhotoPath = $request->file('profile_photo_path')->store('public/profile_photos');
            $userData['profile_photo_path'] = '/storage/' . str_replace('public/', '', $profilePhotoPath);
        } elseif (!$request->hasFile('profile_photo_path') && !$user->profile_photo_path) {
            $userData['profile_photo_path'] = '/default/profile.png';
        }

        $user->update($userData);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $user)
    {
        if ($user->profile_photo_path) {
            Storage::disk('public')->delete($user->profile_photo_path);
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
