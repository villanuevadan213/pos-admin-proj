<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\InventoryItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all(); // Fetch all users
        $totalUsers = User::count(); // Count all users
        $inventoryItems = InventoryItem::count(); // Count all inventory items
        $inventoryOverallTotal = InventoryItem::sum('quantity'); // Sum of all inventory items
    
        // Fetch the recent transaction total using your query
        $recentTransactionTotal = DB::table('transactions')
            ->join('transaction_items', function ($join) {
                $join->on('transactions.id', '=', 'transaction_items.transaction_id')
                    ->on('transactions.order_id', '=', 'transaction_items.order_id');
            })
            ->sum('transactions.total');

        // Recent User Activity Logs (fetching recent 5 user activities)
        $recentActivityLogs = DB::table('users')
            ->join('user_activities', 'users.id', '=', 'user_activities.user_id')
            ->select('users.id', 'users.name', 'users.email', 'user_activities.login_at', 'user_activities.logout_at')
            ->orderByDesc(DB::raw('COALESCE(user_activities.logout_at, user_activities.login_at)'))
            ->limit(5) // Fetch only the last 5 activities
            ->get()
            ->map(function ($user) {
                return (array) $user;
            });

        return view('dashboard', compact(
            'users',
            'totalUsers',
            'inventoryItems',
            'inventoryOverallTotal',
            'recentTransactionTotal',
            'recentActivityLogs'
        ));
    }
}