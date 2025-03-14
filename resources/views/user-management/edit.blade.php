<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <a href="{{ route('user-management') }}"
                    class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800 mb-4">
                    Back
                </a>
                <form action="{{ route('users.update', $user->id) }}" method="POST" class="mt-4">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role:</label>
                        <select name="role" id="role"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="User" {{ $user->role == 'User' ? 'selected' : '' }}>User</option>
                            <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="position" class="block text-gray-700 text-sm font-bold mb-2">Position:</label>
                        <select name="position" id="position"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="" {{ $user->position == '' ? 'selected' : '' }}>
                            </option>
                            <option value="Cashiers" {{ $user->position == 'Cashiers' ? 'selected' : '' }}>Cashiers
                            </option>
                            <option value="Managers" {{ $user->position == 'Managers' ? 'selected' : '' }}>Managers
                            </option>
                            <option value="Staff" {{ $user->position == 'Staff' ? 'selected' : '' }}>Staff</option>
                        </select>
                    </div>
                    <div class="flex items-center justify-end">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>