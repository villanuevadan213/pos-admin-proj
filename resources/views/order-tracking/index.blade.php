<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sales Report') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="{{ asset('common/css/order-tracking.css') }}">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Date Filter Input -->
                <div class="mb-4">
                    <label for="date-filter" class="block text-sm font-medium text-gray-700">Filter by Date:</label>
                    <input type="date" id="date-filter" name="date"
                        value="{{ request('date', \Carbon\Carbon::now()->format('Y-m-d')) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        onchange="filterByDate()">
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200" id="order-table">
                        <thead class="bg-gray-50 text-center">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Order
                                    Number</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">User ID
                                </th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Total
                                    Items</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Total
                                    Amount</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Created
                                    At</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Items
                                </th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 text-center">
                            @forelse ($orders as $order)
                                <tr class="{{ $loop->odd ? 'bg-gray-100' : 'bg-white' }}">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $order->order_id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $order->user_id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">{{ $order->quantity }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        ₱{{ number_format($order->total_value, 2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($order->transaction_created_at)->format('Y-m-d') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-left">
                                        <strong>{{ $order->item_name }}</strong>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium flex justify-center gap-2 text-center">
                                            <a href="{{ route('order-tracking.show', $order->order_id) }}"
                                                class="h-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View</a>
                                            <form action="{{ route('order-tracking.destroy', $order->order_id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="h-8 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-bold">
                                        No Available Data
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Pagination Links -->
                <div class="mt-4">
                    {{ $orders->links() }}
                </div>
                <div id="total-sales"
                    class="bg-gray-100 px-6 py-3 mt-2 text-lg font-semibold text-gray-800 flex justify-between">
                    <span>Total Sales: </span>
                    <p>₱ <span>0.00</span></p>
                </div>
                <script src="{{ asset('common/js/salesFilter.js') }}"></script>
            </div>
        </div>
    </div>
</x-app-layout>