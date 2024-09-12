<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
    

        $user->fill($request->validated());
    
        if ($request->hasFile('photo')) {
            if ($user->photo && $user->photo !== '/default/profile.png') {
                $photoPath = public_path('profile_photos/' . basename($user->photo));
                if (file_exists($photoPath)) {
                    unlink($photoPath);
                }
            }
    
            $profilePhotoPath = $request->file('photo')->move(public_path('profile_photos'), $request->file('photo')->getClientOriginalName());
            $user->photo = '/profile_photos/' . basename($profilePhotoPath);
        }
 
        $user->save();
    
        return redirect()->route('profile.edit')->with('status', 'perfil actualizado');
    }
    
    

    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);
    
        $user = $request->user();
    
        Auth::logout();
    
        if ($user->photo && $user->photo !== '/default/profile.png') {
            $photoPath = public_path('profile_photos/' . basename($user->photo));
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }
    
        $user->delete();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
    
}
