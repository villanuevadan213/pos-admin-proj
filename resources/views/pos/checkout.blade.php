<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout Summary') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Review Your Order</h3>

                <table class="min-w-full table-auto border-collapse mb-6">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">Item Name</th>
                            <th class="px-4 py-2 border">Unit Price</th>
                            <th class="px-4 py-2 border">Quantity</th>
                            <th class="px-4 py-2 border">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td class="px-4 py-2 border">{{ $item['name'] }}</td>
                                <td class="px-4 py-2 border">{{ number_format($item['unit_price'], 2) }}</td>
                                <td class="px-4 py-2 border">{{ $item['quantity'] }}</td>
                                <td class="px-4 py-2 border">{{ number_format($item['unit_price'] * $item['quantity'], 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-right mb-4">
                    <h4 class="text-lg font-bold">Total: ₱{{ number_format($total, 2) }}</h4>
                </div>

                <!-- Confirmation Form -->
                <form method="POST" action="{{ route('pos.confirm_checkout') }}">
                    @csrf
                    <input type="hidden" name="checkout_data" value="{{ json_encode($items) }}">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Confirm Checkout
                    </button>
                    <a href="{{ route('pos') }}"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>