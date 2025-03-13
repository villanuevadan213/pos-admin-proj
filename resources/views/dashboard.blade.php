<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="{{ asset('common/css/dashboard.css') }}">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-neutral-200 p-6 rounded-lg shadow-lg">
                            <h2 class="text-2xl font-bold">Earnings</h2>
                            <p class="text-4xl mt-4">$628</p>
                        </div>
                        <div class="bg-neutral-200 p-6 rounded-lg shadow-lg">
                            <h2 class="text-2xl font-bold">Share</h2>
                            <p class="text-4xl mt-4">2434</p>
                        </div>
                        <div class="bg-neutral-200 p-6 rounded-lg shadow-lg">
                            <h2 class="text-2xl font-bold">Likes</h2>
                            <p class="text-4xl mt-4">1259</p>
                        </div>
                        <div class="bg-neutral-200 p-6 rounded-lg shadow-lg">
                            <h2 class="text-2xl font-bold">Rating</h2>
                            <p class="text-4xl mt-4">8.5</p>
                        </div>
                        <div class="bg-neutral-50 p-6 rounded-lg shadow-lg col-span-2">
                            <h2 class="text-2xl font-bold">Result</h2>
                            <div class="mt-4">
                                <canvas id="resultChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Include custom dashboard script -->
    <script src="{{ asset('common/js/dashboard.js') }}"></script>
</x-app-layout>