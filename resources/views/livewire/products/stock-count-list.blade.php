<div wire:poll>
    <div class="flex justify-between mb-4">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Today\'s Stock Counts') }}
        </h2>

        <!-- Toggle Filter by User -->
        <div class="flex items-center">
            <x-label for="filterByUser" value="{{ __('Show only my records') }}" />
            <input id="filterByUser" type="checkbox" wire:click="toggleUserFilter" class="ml-2" {{ $filterByUser ? 'checked' : '' }}>
        </div>
    </div>

    <!-- Stock Counts Table -->
    <div class="overflow-x-auto">
        <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">{{ __('Product') }}</th>
                    <th class="px-4 py-2">{{ __('Count') }}</th>
                    <th class="px-4 py-2">{{ __('Recorded By') }}</th>
                    <th class="px-4 py-2">{{ __('Date') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($stockCounts as $stockCount)
                    <tr>
                        <td class="border px-4 py-2">{{ $stockCount->product->name }}</td>
                        <td class="border px-4 py-2">{{ $stockCount->count }}</td>
                        <td class="border px-4 py-2">{{ $stockCount->createdBy ? $stockCount->createdBy->name : 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $stockCount->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center p-4">{{ __('No stock counts recorded today.') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
