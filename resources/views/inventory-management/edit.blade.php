<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Inventory Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('inventory.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Item Name:</label>
                        <input type="text" name="name" id="name" value="{{ $item->item_name }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                        <input type="text" name="category" id="category" value="{{ $item->category }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" value="{{ $item->quantity }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required oninput="calculateTotalValue()">
                    </div>
                    <div class="mb-4">
                        <label for="unit_price" class="block text-gray-700 text-sm font-bold mb-2">Unit Price:</label>
                        <input type="number" step="0.01" name="unit_price" id="unit_price"
                            value="{{ $item->unit_price }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required oninput="calculateTotalValue()">
                    </div>
                    <div class="mb-4">
                        <label for="total_value" class="block text-gray-700 text-sm font-bold mb-2">Total Value:</label>
                        <input type="number" step="0.01" name="total_value" id="total_value"
                            value="{{ $item->total_value }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            readonly>
                    </div>
                    <div class="mb-4">
                        <label for="supplier" class="block text-gray-700 text-sm font-bold mb-2">Supplier:</label>
                        <input type="text" name="supplier" id="supplier" value="{{ $item->supplier }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="notes" class="block text-gray-700 text-sm font-bold mb-2">Notes:</label>
                        <textarea name="notes" id="notes"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $item->notes }}</textarea>
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update
                        </button>
                        <a href="{{ route('inventory-management') }}"
                            class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('common/js/inventory.js') }}"></script>
</x-app-layout>