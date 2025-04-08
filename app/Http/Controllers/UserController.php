<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }
    public function changePassword(Request $request)
    {
        // Validate the input
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:6',
            'repeat_password' => 'required|string|min:6|same:new_password', // Ensure repeat_password matches new_password
        ]);

        // Get the currently authenticated user
        $authUser = Auth::user();

        // Check if the old password is correct
        if (!Hash::check($request->old_password, $authUser->password)) {
            return back()->withErrors(['old_password' => 'The provided password does not match our records.']);
        }
        $user = User::find($authUser->id);
        // Update the user's password
        $user->password = Hash::make($request->new_password);

        // Save the updated user record
        $user->save();

        // Redirect with success message
        return back()->with('success', 'Password updated successfully!');
    }
}
