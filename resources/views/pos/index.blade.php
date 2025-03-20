<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Point of Sale') }}
        </h2>
    </x-slot>

    <div class="py-12">
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
                        <div class="p-4 bg-white shadow rounded-lg flex flex-col space-y-4 h-full">
                            <img src="{{ asset('common/images/No_Image_Available.jpg') }}" alt="Logo">
                            <h3 class="text-lg font-bold text-gray-800">{{ $item->item_name }}</h3>
                            <p class="text-sm text-gray-500">Code: {{ $item->item_code }}</p>
                            <p class="text-sm text-gray-500">Price: ₱{{ $item->unit_price }}</p>
                            <p class="text-sm text-gray-500">Available: {{ $item->quantity }}</p>
                            <!-- Spacer to push content above -->
                            <div class="flex-grow"></div>
                            <!-- Quantity input and Add button at the bottom -->
                            <div class="w-full">
                                <input type="number" id="quantity-{{ $item->id }}" min="0" max="{{ $item->quantity }}"
                                    class="border rounded px-2 py-1 w-full text-center mb-2" placeholder="Quantity"
                                    value="0">
                                <button
                                    onclick="addToCart({{ $item->id }}, '{{ $item->item_name }}', {{ $item->unit_price }}, {{ $item->quantity }})"
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full">
                                    Add
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>


                <!-- Cart Summary -->
                <div class="w-full lg:w-1/3 bg-white shadow rounded-lg p-4 flex flex-col space-y-4">
                    <h3 class="text-lg font-bold text-gray-800">Cart Summary</h3>
                    <div id="cart-items" class="space-y-4 flex-grow">
                        <p class="text-sm text-gray-500 italic">Your cart is empty.</p>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-800">Total: ₱<span id="cart-total">0.00</span></h4>
                    </div>
                    <!-- Clear List Button -->
                    <button onclick="clearCart()"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded w-full">
                        Clear List
                    </button>
                    <form id="checkout-form" method="POST" action="{{ route('pos.confirm_checkout') }}">
                        @csrf
                        <input type="hidden" id="cart-data" name="cart" value="">
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