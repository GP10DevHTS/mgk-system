{{-- <div wire:poll>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Purchase Orders') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-7xl">
            <div class=" overflow-hidden">
                <!-- Purchase Orders Table -->
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2">{{ __('Order Number') }}</th>
                                <th class="px-4 py-2">{{ __('Supplier') }}</th>
                                <th class="px-4 py-2">{{ __('Order Date') }}</th>
                                <th class="px-4 py-2">{{ __('Delivery Date') }}</th>
                                <th class="px-4 py-2">{{ __('Status') }}</th>
                                <th class="px-4 py-2">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchaseOrders as $order)
                                <tr>
                                    <td class="border px-4 py-2">{{ $order->order_number }}</td>
                                    <td class="border px-4 py-2">{{ $order->supplier->name }}</td>
                                    <td class="border px-4 py-2">{{ $order->ordered_at->format('Y-m-d H:i') }}</td>
                                    <td class="border px-4 py-2">
                                        {{ $order->delivered_at ? $order->delivered_at->format('Y-m-d H:i') : 'N/A' }}
                                    </td>
                                    <td class="border px-4 py-2">{{ ucfirst($order->status) }}</td>
                                    <td class="border px-4 py-2">
                                        <x-button wire:click="viewDetails({{ $order->id }})"
                                            class="bg-blue-500 hover:bg-blue-700 text-white">
                                            {{ __('View Details') }}
                                        </x-button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Modal for Order Details -->
                <x-dialog-modal wire:model="showDetailsModal">
                    <x-slot name="title">
                        {{ __('Purchase Order Details') }}
                    </x-slot>

                    <x-slot name="content">
                        @if ($selectedOrder)
                            <div class="space-y-4">
                                <h3 class="font-semibold text-lg">{{ __('Order Number:') }}
                                    {{ $selectedOrder->order_number }}</h3>
                                <p><strong>{{ __('Supplier:') }}</strong> {{ $selectedOrder->supplier->name }}</p>
                                <p><strong>{{ __('Order Date:') }}</strong>
                                    {{ $selectedOrder->ordered_at->format('Y-m-d H:i') }}</p>
                                <p><strong>{{ __('Delivery Date:') }}</strong>
                                    {{ $selectedOrder->delivered_at ? $selectedOrder->delivered_at->format('Y-m-d H:i') : 'N/A' }}
                                </p>
                                <p><strong>{{ __('Status:') }}</strong> {{ ucfirst($selectedOrder->status) }}</p>

                                <!-- Items Table -->
                                <h4 class="font-semibold text-lg mt-4">{{ __('Items') }}</h4>
                                <table class="table-auto w-full">
                                    <thead>
                                        <tr class="bg-gray-200">
                                            <th class="px-4 py-2">{{ __('Product') }}</th>
                                            <th class="px-4 py-2">{{ __('Quantity') }}</th>
                                            <th class="px-4 py-2">{{ __('Price') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($selectedOrder->purchaseItems as $item)
                                            <tr>
                                                <td class="border px-4 py-2">{{ $item->product->name }}</td>
                                                <td class="border px-4 py-2">{{ $item->quantity }}</td>
                                                <td class="border px-4 py-2">{{ $item->price }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </x-slot>

                    <x-slot name="footer">
                        <x-secondary-button wire:click="$set('showDetailsModal', false)" wire:loading.attr="disabled">
                            {{ __('Close') }}
                        </x-secondary-button>
                    </x-slot>
                </x-dialog-modal>
            </div>
        </div>
    </div>
</div> --}}


<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Purchase Orders') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-7xl">
            <div class="overflow-hidden">
                <!-- Purchase Orders Table -->
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2">{{ __('Order Number') }}</th>
                                <th class="px-4 py-2">{{ __('Supplier') }}</th>
                                <th class="px-4 py-2">{{ __('Order Date') }}</th>
                                <th class="px-4 py-2">{{ __('Delivery Date') }}</th>
                                <th class="px-4 py-2">{{ __('Status') }}</th>
                                <th class="px-4 py-2">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchaseOrders as $order)
                                <tr>
                                    <td class="border px-4 py-2">{{ $order->order_number }}</td>
                                    <td class="border px-4 py-2">{{ $order->supplier->name }}</td>
                                    <td class="border px-4 py-2">{{ $order->ordered_at->format('Y-m-d H:i') }}</td>
                                    <td class="border px-4 py-2">
                                        {{ $order->delivered_at ? $order->delivered_at->format('Y-m-d H:i') : 'N/A' }}
                                    </td>
                                    <td class="border px-4 py-2">{{ ucfirst($order->status) }}</td>
                                    <td class="border px-4 py-2">
                                        <x-button wire:click="viewDetails({{ $order->id }})"
                                            class="bg-blue-500 hover:bg-blue-700 text-white">
                                            {{ __('View Details') }}
                                        </x-button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Modal for Order Details -->
                <x-dialog-modal wire:model="showDetailsModal">
                    <x-slot name="title">
                        {{ __('Purchase Order Details') }}
                    </x-slot>

                    <x-slot name="content">
                        @if ($selectedOrder)
                            <div class="space-y-4">
                                <h3 class="font-semibold text-lg">{{ __('Order Number:') }}
                                    {{ $selectedOrder->order_number }}</h3>
                                <p><strong>{{ __('Supplier:') }}</strong> {{ $selectedOrder->supplier->name }}</p>
                                <p><strong>{{ __('Order Date:') }}</strong>
                                    {{ $selectedOrder->ordered_at->format('Y-m-d H:i') }}</p>
                                <p><strong>{{ __('Delivery Date:') }}</strong>
                                    {{ $selectedOrder->delivered_at ? $selectedOrder->delivered_at->format('Y-m-d H:i') : 'N/A' }}
                                </p>
                                <p><strong>{{ __('Status:') }}</strong> {{ ucfirst($selectedOrder->status) }}</p>

                                <!-- Items Table -->
                                <h4 class="font-semibold text-lg mt-4">{{ __('Items') }}</h4>
                                <table class="table-auto w-full">
                                    <thead>
                                        <tr class="bg-gray-200">
                                            <th class="px-4 py-2">{{ __('Product') }}</th>
                                            <th class="px-4 py-2">{{ __('Quantity') }}</th>
                                            <th class="px-4 py-2">{{ __('Delivered Quantity') }}</th>
                                            <th class="px-4 py-2">{{ __('Price') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($selectedOrder->purchaseItems as $item)
                                            <tr>
                                                <td class="border px-4 py-2">{{ $item->product->name }}</td>
                                                <td class="border px-4 py-2">{{ $item->quantity }}</td>
                                                <td class="border px-4 py-2">
                                                    <x-input type="number" wire:model.defer="deliveryQuantities.{{ $item->id }}" min="0" placeholder="Delivered Quantity" />
                                                </td>
                                                <td class="border px-4 py-2">{{ $item->price }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </x-slot>

                    <x-slot name="footer">
                        @if ($selectedOrder && $selectedOrder->status === 'pending')
                            <x-button wire:click="updateDelivery" wire:loading.attr="disabled" class="bg-green-500 hover:bg-green-700 text-white">
                                {{ __('Update Delivery') }}
                            </x-button>
                            <x-secondary-button wire:click="cancelOrder" wire:loading.attr="disabled" class="ml-2">
                                {{ __('Cancel Order') }}
                            </x-secondary-button>
                        @endif
                        <x-secondary-button wire:click="$set('showDetailsModal', false)" wire:loading.attr="disabled" class="ml-2">
                            {{ __('Close') }}
                        </x-secondary-button>
                    </x-slot>
                </x-dialog-modal>
            </div>
        </div>
    </div>
</div>
