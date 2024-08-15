<div>
    <div class="grid gird-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h3 class="text-lg font-semibold">{{ __('Stock History') }}</h3>
        </div>
        <!-- Date Filter -->
        <div class="flex space-x-4 mt-4">
            <x-input id="startDate" type="date" wire:model.live.debounce.300ms="startDate" />
            <x-input id="endDate" type="date" wire:model.live.debounce.300ms="endDate" />
        </div>
    </div>


    <!-- Stock History Table -->
    <div class="overflow-x-auto mt-4">
        <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">{{ __('Date') }}</th>
                    <th class="px-4 py-2">{{ __('Quantity') }}</th>
                    <th class="px-4 py-2">{{ __('Recorded By') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stockMovements as $movement)
                    <tr class="{{ $movement->trashed() ? 'text-red-500' : '' }}">
                        <td class="border px-4 py-2">{{ $movement->created_at->format('Y-m-d H:i') }}</td>
                        <td class="border px-4 py-2">{{ $movement->count }}</td>
                        <td class="border px-4 py-2">
                            {{ ucfirst($movement->createdBy ? $movement->createdBy->name : 'N/A') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
