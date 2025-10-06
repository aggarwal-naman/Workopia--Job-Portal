<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Stoarge;

class ProfileController extends Controller
{
    // @desc  Update Profile Info
    // @route PUT /profile
    public function update(Request $request) :RedirectResponse 
    {
        // Get logged in user
        $user = Auth::user();

        // Validate Data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|max:100',
            'avatar' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        // Get user name and email
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Handle avatar upload
        if($request->hasFile('avatar')){
            // Delete old avatar if exists
            if($user->avatar){
                Storage::delete('public/' . $user->avatar);
            }

            // Store new avatar
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        // Update user info
        $user->save();

        return redirect() -> route('dashboard') -> with('success', 'Profile info updated!');
    }
}
