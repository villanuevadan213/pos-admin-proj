<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="{{ asset('common/css/dashboard.css') }}">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Total Users -->
                        <div class="bg-neutral-200 p-6 rounded-lg shadow-lg">
                            <h2 class="text-2xl font-bold">Total Users</h2>
                            <p class="text-4xl mt-4">{{ $totalUsers }}</p>
                        </div>

                        <!-- Inventory -->
                        <div class="bg-neutral-200 p-6 rounded-lg shadow-lg">
                            <h2 class="text-2xl font-bold">Inventory Total Items</h2>
                            <p class="text-4xl mt-4">{{ $inventoryItems }}</p>
                        </div>

                        <div class="bg-neutral-200 p-6 rounded-lg shadow-lg">
                            <h2 class="text-2xl font-bold">Overall Item Total</h2>
                            <p class="text-4xl mt-4">{{ $inventoryOverallTotal }}</p>
                        </div>

                        <!-- Recent Transactions -->
                        <div class="bg-neutral-200 p-6 rounded-lg shadow-lg">
                            <h2 class="text-2xl font-bold">Recent Transaction Total</h2>
                            <p class="text-4xl mt-4">₱ {{ number_format($recentTransactionTotal, 2)}}</p>
                        </div>

                        <!-- Recent Activity Logs -->
                        <div class="bg-neutral-50 p-6 rounded-lg shadow-lg col-span-2">
                            <h2 class="text-2xl font-bold">Recent 5 Users Activity Logs</h2>
                            <div class="mt-4">
                                <table class="table-auto w-full border border-gray-300">
                                    <thead>
                                        <tr class="bg-gray-100 text-left">
                                            <th class="px-4 py-2 border">Name</th>
                                            <th class="px-4 py-2 border">Login At</th>
                                            <th class="px-4 py-2 border">Logout At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recentActivityLogs as $log)
                                            <tr>
                                                <td class="px-4 py-2 border">{{ $log['name'] }}</td>
                                                <td class="px-4 py-2 border">{{ $log['login_at'] }}</td>
                                                <td class="px-4 py-2 border">
                                                    {{ $log['logout_at'] ?? 'N/A' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Include custom dashboard script -->
    <script src="{{ asset('common/js/dashboard.js') }}"></script>
</x-app-layout>