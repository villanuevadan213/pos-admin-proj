<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Tracking') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="{{ asset('common/css/order-tracking.css') }}">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 text-center">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Order Number
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    User ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Total Amount
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 text-center">
                            @foreach ($orders as $order)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $order->order_number }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $order->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $order->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        {{ $order->total_amount }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="alert alert-{{ $order->status }} text-xs">{{ $order->status }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium flex justify-center gap-1 text-center">
                                            <a href="{{ route('order.show', $order->id) }}"
                                                class="h-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                View
                                            </a>
                                            <form action="{{ route('order.destroy', $order->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="h-8 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>