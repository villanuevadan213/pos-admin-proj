<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex justify-end p-6">
                    <a href="{{ route('inventory.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">
                        Add New Item
                    </a>
                </div>
                <div class="p-6 sm:px-10 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="p-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Item ID
                                    </th>
                                    <th scope="col"
                                        class="p-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Item Name
                                    </th>
                                    <th scope="col"
                                        class="p-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Category
                                    </th>
                                    <th scope="col"
                                        class="p-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Quantity
                                    </th>
                                    <th scope="col"
                                        class="p-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Unit Price
                                    </th>
                                    <th scope="col"
                                        class="p-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Total Value
                                    </th>
                                    <th scope="col"
                                        class="p-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Supplier
                                    </th>
                                    <th scope="col"
                                        class="p-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date Added
                                    </th>
                                    <th scope="col"
                                        class="p-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Last Updated
                                    </th>
                                    <th scope="col"
                                        class="p-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Notes
                                    </th>
                                    <th scope="col"
                                        class="p-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($items->isEmpty())
                                    <tr>
                                        <td colspan="11"
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center font-bold">
                                            No Available Data
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($items as $item)
                                        <tr class="{{ $loop->odd ? 'bg-gray-100' : 'bg-white' }}">
                                            <td class="p-3 whitespace-nowrap text-sm text-gray-500">
                                                {{ $item->item_code }}
                                            </td>
                                            <td class="p-3 whitespace-nowrap text-sm text-gray-500">{{ $item->item_name }}
                                            </td>
                                            <td class="p-3 whitespace-nowrap text-sm text-gray-500">{{ $item->category }}</td>
                                            <td class="p-3 whitespace-nowrap text-sm text-gray-500 text-center">
                                                {{ $item->quantity }}
                                            </td>
                                            <td class="p-3 whitespace-nowrap text-sm text-right text-gray-500">
                                                {{ $item->unit_price }}
                                            </td>
                                            <td class="p-3 whitespace-nowrap text-sm text-right text-gray-500">
                                                {{ $item->total_value }}
                                            </td>
                                            <td class="p-3 whitespace-nowrap text-sm text-gray-500">{{ $item->supplier }}</td>
                                            <td class="p-3 whitespace-nowrap text-sm text-gray-500">{{ $item->created_at }}
                                            </td>
                                            <td class="p-3 whitespace-nowrap text-sm text-gray-500">{{ $item->updated_at }}
                                            </td>
                                            <td class="p-3 whitespace-nowrap text-sm text-gray-500">{{ $item->notes }}</td>
                                            <td class="p-3 whitespace-nowrap text-sm text-gray-500 text-center">
                                                <a href="{{ route('inventory.edit', $item->id) }}"
                                                    class="text-blue-500 hover:underline">Update</a>
                                                <form action="{{ route('inventory.destroy', $item->id) }}" method="POST"
                                                    class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:underline ml-2"
                                                        onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>