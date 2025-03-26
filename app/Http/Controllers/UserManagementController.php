<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserManagementController extends Controller
{
    public function index()
    {
        // Fetch all users except the currently logged-in user
        $users = User::where('id', '!=', Auth::id())
                 ->orderByDesc('id')
                 ->paginate(10, ['*'], 'usersPage'); // Custom query parameter: 'usersPage'

        // Fetch all user activities
        $userActivities = DB::table('users')
                ->join('user_activities', 'users.id', '=', 'user_activities.user_id')
                ->select('users.id', 'users.name', 'users.email', 'user_activities.login_at', 'user_activities.logout_at')
                ->orderByDesc(DB::raw('COALESCE(user_activities.logout_at, user_activities.login_at)'))
                ->paginate(10, ['*'], 'activitiesPage'); // Custom query parameter: 'activitiesPage'

        // Apply the mapping to the items while keeping pagination intact
        $userActivities->getCollection()->transform(function ($user) {
            return (array) $user;
        });

        // Pass the users and user activities to the view
        return view('user-management.index', compact('users', 'userActivities'));
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
            'position' => 'required|string|in:,Cashiers,Managers,Staff',
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
            'position' => 'required|string|in:,Cashiers,Managers,Staff',
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