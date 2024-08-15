<div wire:poll>
    {{-- Success is as dangerous as failure. --}}
    @if ($products->isEmpty())
        <p>No products available.</p>
    @else
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Category</th>
                    <th class="px-4 py-2">Current Stock</th>
                    <th class="px-4 py-2">Minimum Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    @php
                        $currentStock = $product->latestStockCount();
                        $minStock = $product->min_stock;
                        
                        // Determine the color based on stock comparison
                        $stockIndicatorColor = $currentStock <= $minStock ? 'bg-red-500' : 'bg-green-500';
                    @endphp
                    <tr>
                        <td class="border px-4 py-2">
                            <a class="text-blue-500" href="{{ route('product.view', ['uuid' => $product->uuid]) }}">{{ $product->name }}</a>
                        </td>
                        <td class="border px-4 py-2">{{ $product->description }}</td>
                        <td class="border px-4 py-2">{{ $product->category ? $product->category->name : 'N/A' }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex items-center space-x-2">
                                <span class="w-3 h-3 rounded-full {{ $stockIndicatorColor }}"></span>
                                <span>{{ $currentStock }}</span>
                            </div>
                        </td>
                        <td class="border px-4 py-2">{{ $minStock }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
