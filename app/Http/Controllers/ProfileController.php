<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        if ($request->hasFile('photo')) {
            if ($user->photo && $user->photo !== '/profile_photos/default_profile.png') {
                $previousPhotoPath = base_path('../profile_photos/' . basename($user->photo));

                if (File::exists($previousPhotoPath)) {
                    File::delete($previousPhotoPath);
                }
            }

            $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $profilePhotoPath = $request->file('photo')->move(base_path('../profile_photos'), $fileName);

            $user->photo = '/profile_photos/' . $fileName;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'Perfil actualizado');
    }


    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        if ($user->rol_id === 1) {
            return Redirect::back()->with('error', 'No se puede eliminar la cuenta del administrador.');
        }

        if ($user->id === 2) {
            return Redirect::back()->with('error', 'No puedes eliminar tu cuenta de recolector. Contacta al administrador principal para darte de baja.');
        }

        if ($user->photo && $user->photo !== '/profile_photos/default_profile.png') {
            $photoPath = base_path('../profile_photos/' . basename($user->photo));

            if (File::exists($photoPath)) {
                File::delete($photoPath);
            }
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('status', 'Cuenta eliminada.');
    }

    // public function restore($userId)
    // {
    //     $user = User::withTrashed()->find($userId);

    //     if ($user) {
    //         $user->restore();

    //         return redirect()->back()->with('status', 'Usuario restaurado exitosamente.');
    //     }

    //     return redirect()->back()->with('error', 'Usuario no encontrado.');
    // }
}
