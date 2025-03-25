<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Point of Sale') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Flash Messages -->
            @if (session('message'))
                <div class="bg-green-500 text-white font-bold rounded px-4 py-2 mb-4">
                    {{ session('message') }}
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-500 text-white font-bold rounded px-4 py-2 mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <div class="flex flex-col lg:flex-row space-y-6 lg:space-y-0 lg:space-x-6">
                <!-- Product Cards -->
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 flex-grow">
                    @foreach ($inventoryItems as $item)
                                    <div role="button" class="p-4 bg-white shadow rounded-lg flex flex-col space-y-4 h-full"
                                        onclick="addToCart({{ $item->id }}, '{{ $item->item_name }}', {{ $item->unit_price }}, {{ $item->quantity }})">
                                        <img src="{{ file_exists(public_path('common/images/' . $item->item_code . '.jpg'))
                        ? asset('common/images/' . $item->item_code . '.jpg')
                        : asset('common/images/No_Image_Available.jpg') }}" alt="Logo">
                                        <h3 class="text-lg font-bold text-gray-800">{{ $item->item_name }}</h3>
                                        <p class="text-sm text-gray-500">Code: {{ $item->item_code }}</p>
                                        <p class="text-sm text-gray-500">Price: ₱{{ $item->unit_price }}</p>
                                        <p class="text-sm text-gray-500">Available: {{ $item->quantity }}</p>
                                        <!-- Spacer to push content above -->
                                        <div class="flex-grow"></div>
                                        <!-- Quantity input and Add button at the bottom -->
                                        <div class="w-full hidden">
                                            <input type="number" id="quantity-{{ $item->id }}" min="1" max="{{ $item->quantity }}"
                                                class="border rounded px-2 py-1 w-full text-center mb-2" placeholder="Quantity"
                                                value="1">
                                        </div>
                                    </div>
                    @endforeach
                </div>
                <!-- Cart Summary -->
                <div class="w-full lg:w-1/3 bg-white shadow rounded-lg p-4 flex flex-col space-y-4">
                    <h3 class="text-lg font-bold text-gray-800">Cart Summary</h3>
                    <div id="cart-items" class="space-y-4 overflow-auto flex-grow">
                        <table class="w-full border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100 border-b border-gray-300">
                                    <th class="w-1/12 border border-gray-300 px-4 py-2 text-left">ID</th>
                                    <th class="w-6/12 border border-gray-300 px-4 py-2 text-left">Name</th>
                                    <th class="w-1/12 border border-gray-300 px-4 py-2 text-right">Qty</th>
                                    <th class="w-2/12 border border-gray-300 px-4 py-2 text-right">Price</th>
                                    <th class="w-2/12 border border-gray-300 px-4 py-2 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td class="border border-gray-300 px-4 py-2 text-center font-bold" colspan="5">Your cart
                                    is empty.
                                </td>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-800 flex justify-between">
                            <span>Total:</span>
                            <p>₱ <span id="cart-total"> 0.00</span></p>
                        </h4>
                    </div>
                    <!-- Discount Section -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-bold text-gray-800 flex justify-between">
                            <span>Discount:</span>
                            <p>- <span id="discount-total"> 0.00</span></p>
                        </h3>
                        <div>
                            <label for="discount-type" class="block text-sm font-medium text-gray-700">Discount
                                Type</label>
                            <select id="discount-type" name="discount_type"
                                onchange="updateDiscount(this.value, document.getElementById('discount-value').value)"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option value="percentage">Percentage</option>
                                <option value="fixed">Fixed-Price</option>
                                <option value="volume">Volume</option>
                            </select>
                        </div>
                        <div>
                            <label for="discount-value" class="block text-sm font-medium text-gray-700">Discount
                                Value</label>
                            <input type="number" id="discount-value" name="discount_value" min="0" value="0"
                                onchange="updateDiscount(document.getElementById('discount-type').value, this.value)"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <button onclick="clearCart()"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded w-full">
                        Clear List
                    </button>
                    <form id="checkout-form" method="POST" action="{{ route('pos.checkout') }}">
                        @csrf
                        <input type="hidden" id="cart-data" name="cart" value="">
                        <input type="hidden" id="discount-type-field" name="discount_type" value="percentage">
                        <input type="hidden" id="discount-value-field" name="discount_value" value="0">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">
                            Checkout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('common/js/addToCart.js') }}"></script>
</x-app-layout>