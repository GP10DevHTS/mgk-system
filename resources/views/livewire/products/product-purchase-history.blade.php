<div>
    <h3 class="text-lg font-semibold">{{ __('Purchase History') }}</h3>

    <!-- Date Filter -->
    <div class="flex space-x-4 mt-4">
        <x-input id="startDate" type="date" wire:model="startDate" />
        <x-input id="endDate" type="date" wire:model="endDate" />
    </div>

    <!-- Purchase History Table -->
    <div class="overflow-x-auto mt-4">
        <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">{{ __('Date') }}</th>
                    <th class="px-4 py-2">{{ __('Order Number') }}</th>
                    <th class="px-4 py-2">{{ __('Supplier') }}</th>
                    <th class="px-4 py-2">{{ __('Ordered Quantity') }}</th>
                    <th class="px-4 py-2">{{ __('Delivered Quantity') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchaseHistory as $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $item->purchase->ordered_at->format('Y-m-d') }}</td>
                        <td class="border px-4 py-2">{{ $item->purchase->order_number }}</td>
                        <td class="border px-4 py-2">{{ $item->purchase->supplier->name }}</td>
                        <td class="border px-4 py-2">{{ $item->quantity }}</td>
                        <td class="border px-4 py-2">{{ $item->delivered_quantity ?? 'Pending' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
