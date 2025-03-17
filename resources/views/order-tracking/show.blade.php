<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <a href="{{ route('order-tracking') }}"
                    class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800 mb-4">
                    Back to Orders
                </a>

                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="bg-gray-800 text-white px-6 py-4">
                        Order #{{ $order->order_number }}
                    </div>
                    <div class="px-6 py-4">
                        {{-- <p><strong>Order Number:</strong> {{ $order->user->order_number }}</p> --}}
                        <p><strong>User ID:</strong> {{ $order->id }}</p>
                        <p><strong>Name:</strong> {{ $order->name }}</p>
                        <p><strong>Total Amount:</strong> {{ $order->total_amount }}</p>
                        <p><strong>Status:</strong> {{ $order->status }}</p>
                        <p><strong>Created At:</strong> {{ $order->created_at }}</p>
                        <p><strong>Updated At:</strong> {{ $order->updated_at }}</p>
                        <p>
                        <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4 text-center">
                            <a href="{{ route('order.edit', $order->id) }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded h-10">
                                Edit Order
                            </a>
                            <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded h-10">
                                    Delete Order
                                </button>
                            </form>
                        </div>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>