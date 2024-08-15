<x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stock Counts') }}
        </h2>

    </div>
</x-slot>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            @livewire('products.new-stock-count-modal')
        </div>
        <x-section-border />
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            @livewire('products.stock-count-list')
        </div>
    </div>
</div>
