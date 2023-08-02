<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        if ($request->file('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = 'profileImage' . '.' . $image->extension();
            $relativePath = 'storage/images/users/' . $request->user()->id;
            $absolutePath = public_path('storage/images/users/' . $request->user()->id);
            $image->move($absolutePath, $imageName);
            $request->user()->profile_image = $relativePath . '/' . $imageName;
        }

        $request->user()->save();

        // if description got updated
        if ($request->statusName == 'personal-information') {
            $status = 'personal-information-updated';
        } elseif($request->statusName == 'profile-information') {
            $status = 'profile-information-updated';
        } else {
            $status = null;
        }
        return Redirect::route('profile.edit')->with('status', $status);
    }

    /**
     * Delete the user's account.
     */
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
