<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserManagementController extends Controller
{
    public function index()
    {
        // Fetch all users except the currently logged-in user
        $users = User::where('id', '!=', Auth::id())->get();

        // Pass the users to the view
        return view('user-management.index', compact('users'));
    }

    public function create()
    {
        return view('user-management.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|in:Admin,User',
            'position' => 'required|string|in:cashiers,managers,staff',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'position' => $request->position,
            'password' => bcrypt('password'),
        ]);

        return redirect()->route('user-management')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('user-management.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|in:Admin,User',
            'position' => 'required|string|in:cashiers,managers,staff',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'position' => $request->position,
        ]);

        return redirect()->route('user-management')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user-management')->with('success', 'User deleted successfully.');
    }
}