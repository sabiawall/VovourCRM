<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->whereHas('roles', function ($query) {
            $query->where('name', '!=', 'admin');
        })->get();

        $roles = Role::all();

        return view('backend.users.index', compact('users', 'roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('backend.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole($request->role);

        return redirect()->route('users.index')->with('success', 'User created successfully with assigned role.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);  // Manually fetching the user by id
        $roles = Role::all();
        return view('backend.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id, // Ensure unique email, except for this user
            'password' => 'nullable|min:6', // Password is optional
            'role' => 'required|exists:roles,name', // Ensure role exists
        ]);

        // Update user details
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password, // Only update password if provided
        ]);

        // Sync the roles (update the user's role)
        $user->syncRoles([$request->role]);

        return redirect()->route('users.index')->with('success', 'User updated successfully with assigned role.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function assignRole(Request $request, $user)
    {
        $request->validate([
            'role' => 'required|string|exists:roles,name',
        ]);

        $user = User::findOrFail($user);
        $user->syncRoles([$request->role]);

        return redirect()->route('users.index')->with('success', 'Role assigned successfully!');
    }
}
