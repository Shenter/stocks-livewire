<x-app-layout>
    <x-slot name="header">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">   @livewire('period-switcher')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                @livewire('graphic')

                <div class="p-6 bg-white border-b border-gray-200">


                </div>
            </div>
        </div>
    </div>

</x-app-layout>
