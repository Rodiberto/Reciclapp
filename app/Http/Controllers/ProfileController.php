<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
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

        // Si el email se ha modificado, se debe forzar la verificación
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        if ($request->hasFile('photo')) {
            if ($user->photo && $user->photo !== '/profile_photos/default_profile.png') {
                $previousPhotoPath = public_path('profile_photos/' . basename($user->photo));

                if (File::exists($previousPhotoPath)) {
                    File::delete($previousPhotoPath);
                }
            }

            $profilePhotoPath = $request->file('photo')->move(public_path('profile_photos'), $request->file('photo')->getClientOriginalName());
            $user->photo = '/profile_photos/' . basename($profilePhotoPath);
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        if ($user->photo && $user->photo !== '/profile_photos/default_profile.png') {
            $photoPath = public_path('profile_photos/' . basename($user->photo));

            if (File::exists($photoPath)) {
                File::delete($photoPath);
            }
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
