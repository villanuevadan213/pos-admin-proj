<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Update') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <a href="{{ route('order-tracking') }}"
                    class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800 mb-4">
                    Back to Orders
                </a>

                <!-- Order Details -->
                <form action="{{ route('order.update', $order->order_id) }}" method="POST" class="mt-4">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label for="order_number" class="block text-gray-700 text-sm font-bold mb-2">
                            Order Number:
                        </label>
                        <input type="text" name="order_number" id="order_number" value="{{ $order->order_id }}" disabled
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-200 cursor-not-allowed">
                    </div>

                    <div class="mb-4">
                        <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2">User ID:</label>
                        <input type="text" name="user_id" id="user_id" value="{{ $order->user_id }}" disabled
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-200 cursor-not-allowed">
                    </div>

                    <div class="mb-4">
                        <label for="total_amount" class="block text-gray-700 text-sm font-bold mb-2">Total
                            Amount:</label>
                        <input type="text" name="total_amount" id="total_amount"
                            value="₱{{ number_format($order->items->sum('total_value'), 2) }}" disabled
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-200 cursor-not-allowed">
                    </div>

                    <!-- Status Dropdown -->
                    <div class="mb-4">
                        <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                        <select name="status" id="status"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing
                            </option>
                            <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed
                            </option>
                            <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled
                            </option>
                        </select>
                    </div>

                    <!-- Items Section -->
                    <h3 class="text-lg font-semibold mb-4">Order Items</h3>
                    <table class="min-w-full table-auto border-collapse mb-6">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border">Item Name</th>
                                <th class="px-4 py-2 border">Unit Price</th>
                                <th class="px-4 py-2 border">Quantity</th>
                                <th class="px-4 py-2 border">Total</th>
                                <th class="px-4 py-2 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $item->item_name }}</td>
                                    <td class="px-4 py-2 border">₱{{ number_format($item->price, 2) }}</td>
                                    <td class="px-4 py-2 border">
                                        <input type="number" name="items[{{ $item->id }}][quantity]"
                                            value="{{ $item->quantity }}" min="1"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    </td>
                                    <td class="px-4 py-2 border">₱{{ number_format($item->total_value, 2) }}</td>
                                    <td class="px-4 py-2 border text-center">
                                        <button type="button"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                            Remove
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>