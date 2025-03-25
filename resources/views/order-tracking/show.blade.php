<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sales Report - Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Back Button -->
                <a href="{{ route('order-tracking') }}"
                    class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800 mb-4">
                    ← Back to Order Tracking
                </a>

                <!-- Order Details Card -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <!-- Order Header -->
                    <div class="bg-gray-800 text-white px-6 py-4">
                        <strong>Order #{{ $order->first()->order_id }}</strong>
                    </div>

                    <!-- Order Info -->
                    <div class="px-6 py-4 space-y-4">
                        <p><strong>User ID:</strong> {{ $order->first()->user_id }}</p>
                        <p><strong>Total Amount:</strong> ₱{{ number_format($order->sum('total_value'), 2) }}</p>
                        <p><strong>Created At:</strong> {{ $order->first()->transaction_created_at }}</p>

                        <!-- Items List -->
                        <div class="mt-6">
                            <h3 class="font-bold text-lg">Order Items:</h3>
                            <ul class="mt-2 space-y-2">
                                @foreach ($order as $item)
                                    <li class="border-b pb-2">
                                        <strong>{{ $item->item_name }}</strong> -
                                        Quantity: {{ $item->quantity }} |
                                        Price: ₱{{ number_format($item->price, 2) }} |
                                        Total: ₱{{ number_format($item->total_value, 2) }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Edit and Delete Actions -->
                    <div class="mt-6">
                        {{-- <a href="{{ route('order-tracking.edit', $order->first()->order_id) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center">
                            Edit Order
                        </a> --}}
                        <form action="{{ route('order-tracking.destroy', $order->first()->order_id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this order?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Delete Order
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>