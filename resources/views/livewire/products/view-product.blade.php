<x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <span>
                <a href="{{ route('products') }}" class="text-blue-500 hover:underline">Products</a>
            </span>
            <span class="text-gray-500">/ {{ $product->name }}</span>
        </h2>

        <div class="flex items-center">
            @php
                $currentStock = $product->latestStockCount();
                $minStock = $product->min_stock;

                // Determine the color based on stock comparison
                $stockIndicatorColor = $currentStock <= $minStock ? 'bg-red-500' : 'bg-green-500';
            @endphp
            <span class="mr-2 text-gray-600 font-medium">In Stock:</span>
            <div class="w-4 h-4 rounded-full {{ $stockIndicatorColor }} mr-2"></div>
            <span class="text-lg font-semibold text-gray-800">{{ $currentStock }}</span>
        </div>
    </div>
</x-slot>

<div class="py-12 bg-gray-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Product Details Card -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">{{ __('Product Details') }}</h3>
            <div class="border-t border-gray-200 mt-2"></div>
            <div class="mt-4">
                @livewire('products.product-details', ['product' => $product])
            </div>
        </div>

        <!-- Stock History Card -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">{{ __('Stock History') }}</h3>
            <div class="border-t border-gray-200 mt-2"></div>
            <div class="mt-4">
                @livewire('products.product-stock-history', ['product' => $product])
            </div>
        </div>

        <!-- Purchase History Card -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-gray-800">{{ __('Purchase History') }}</h3>
                <!-- Optional filter button can be added here -->
                <div>
                    <!-- Date Filter -->
                    <input type="date" wire:model="startDate" class="rounded border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                    <input type="date" wire:model="endDate" class="rounded border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>
            </div>
            <div class="border-t border-gray-200 mt-2"></div>
            <div class="mt-4">
                @livewire('products.product-purchase-history', ['product' => $product])
            </div>
        </div>
    </div>
</div>
