<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

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
    
        // Actualizar los campos validados del usuario
        $user->fill($request->validated());
    
        // Si el correo electrónico se ha cambiado, limpiar la verificación de correo
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
    
        // Manejar la actualización de la foto de perfil si se proporciona una nueva
        if ($request->hasFile('profile_photo_path')) {
            // Eliminar la foto de perfil anterior si existe
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }
    
            // Guardar la nueva foto de perfil en el almacenamiento
            $profilePhotoPath = $request->file('profile_photo_path')->store('public/profile_photos');
    
            // Actualizar el campo `profile_photo_path` del usuario con la nueva ruta
            $user->profile_photo_path = '/storage/' . str_replace('public/', '', $profilePhotoPath);
        }
    
        // Guardar los cambios en la base de datos
        $user->save();
    
        // Redireccionar de vuelta a la página de edición del perfil con un mensaje de éxito
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
