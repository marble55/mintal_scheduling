<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
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

    public function updateImage(Request $request){
        // dd($request->all());

        $request->validate([
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $faculty = $request->user()->faculty;

        if ($request->hasFile('image')) {
            if ($faculty->profile_image) {
                Storage::disk('public')->delete($faculty->profile_image);
            }

            $path = $request->file('image')->store('profile_image', 'public');

            $request->merge(['profile_image' => $path]);
        } elseif ($request->input('remove_img')) {
            if ($faculty->profile_image) {
                Storage ::disk('public')->delete($faculty->profile_image);
            }

            $request->merge(['profile_image' => null]);
        }

        $faculty->fill($request->all());
        $faculty->update();

        return redirect()->back()->with('message', 'Profile image has been updated!');
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

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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
