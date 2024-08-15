<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Product Information -->
    <div>
        <h3 class="text-lg font-semibold">{{ __('Product Information') }}</h3>
        <ul class="mt-4 space-y-2">
            <li><strong>{{ __('Name:') }}</strong> {{ $product->name }}</li>
            <li><strong>{{ __('Category:') }}</strong> {{ $product->category->name }}</li>
            <li><strong>{{ __('Unit Price:') }}</strong> {{ number_format($product->price, 2) }}</li>
        </ul>
    </div>

    <!-- Stock Information -->
    <div>
        <h3 class="text-lg font-semibold">{{ __('Stock Information') }}</h3>
        <ul class="mt-4 space-y-2">
            <li><strong>{{ __('Current Stock:') }}</strong> {{ $product->latestStockCount() }}</li>
            <li><strong>{{ __('Minimum Stock Level:') }}</strong> {{ $product->min_stock }}</li>
            <li><strong>{{ __('Stock Value:') }}</strong>
                {{ number_format($product->price * $product->latestStockCount(), 2) }}</li>
        </ul>
    </div>
</div>
