<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller implements HasMiddleware
{
    public static function routes() : array
    {
        return [
            'list' => 'user.list',
            'edit' => 'user.edit',
            'update' => 'user.update',
            'profile' => 'user.profile',
            'changePassword' => 'user.changePassword',
        ];
    }
    public static function middleware() : array 
    {
        return [
            // new Middleware('permission:CRUD_User', only : ['edit', 'update', 'profile', 'changePassword']),
            // new Middleware('permission:CRUD_User', except : ['list'])
        ];
    }

    public function list()
    {
        $users = User::all();
        return view('users.list', compact('users'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::orderBy('name', 'asc')->get();
        $hasRoles = $user->roles->pluck('id');
        return view('users.edit',[
            'user' => $user,
            'roles' => $roles,
            'hasRoles' => $hasRoles,
        ]);
    }
    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            ]);

        // Get the user by ID
        $user = User::findOrFail($id);

        // Update user details
        $user->name = $request->name;
        $user->email = $request->email;

        // Save the updated user record
        $user->save();

        $user->syncRoles($request->role);

        // Redirect with success message
        return redirect()->route('user.list')->with('success', 'User updated successfully!');
    }
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
