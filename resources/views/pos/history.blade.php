<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="min-w-full table-auto border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">Transaction ID</th>
                            <th class="px-4 py-2 border">Total</th>
                            <th class="px-4 py-2 border">Items</th>
                            <th class="px-4 py-2 border">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td class="px-4 py-2 border">{{ $transaction->id }}</td>
                                <td class="px-4 py-2 border">{{ $transaction->total }}</td>
                                <td class="px-4 py-2 border">
                                    <ul>
                                        @foreach ($transaction->items as $item)
                                            <li>{{ $item->item_name }} (x{{ $item->quantity }})</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="px-4 py-2 border">{{ $transaction->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>