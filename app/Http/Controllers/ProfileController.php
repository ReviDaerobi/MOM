<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $user = Auth::user();
        $file = $request->file('photo');
        $path = $file->store('profileLink', 'public');

        // Delete old photo if exists
        if ($user->profileLink) {
            Storage::disk('public')->delete($user->profileLink);
        }

        // Save new photo path
        $user->profileLink = $path;
        $user->save();

        return back()->with('success', 'Profile photo updated successfully.');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|min:3',
        ]);

        $user->username = $request->input('username');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
