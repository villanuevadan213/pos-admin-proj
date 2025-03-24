<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Sales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('order-tracking.update', $order->first()->order_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="font-bold text-lg mb-4">Edit Order Details</h3>
                    @foreach ($order as $item)
                        <div class="mb-4">
                            <label class="block text-gray-700">Item Name:</label>
                            <input type="text" name="items[{{ $item->item_name }}][name]" value="{{ $item->item_name }}"
                                class="w-full border rounded px-2 py-1" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Quantity:</label>
                            <input type="number" name="items[{{ $item->item_name }}][quantity]" value="{{ $item->quantity }}"
                                class="w-full border rounded px-2 py-1" required>
                        </div>
                    @endforeach

                    <div class="mt-6 flex justify-between">
                        <!-- Save Button -->
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Save Changes
                        </button>

                        <!-- Cancel Button -->
                        <a href="{{ route('order-tracking') }}"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
