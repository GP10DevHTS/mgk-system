
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MGK Bar Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-3 gap-6">
            <!-- Quick Actions -->
            <div class="col-span-3 bg-white shadow-md rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">{{ __('Quick Actions') }}</h3>
                <div class="flex space-x-4">
                    <a href="{{ route('stock-counts') }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg">{{ __('Add Stock Count') }}</a>
                    <a href="{{ route('purchases') }}"
                        class="bg-green-500 text-white px-4 py-2 rounded-lg">{{ __('Create Purchase Order') }}</a>
                    {{-- <a href="{{ route('low-stock') }}" class="bg-red-500 text-white px-4 py-2 rounded-lg">{{ __('Low Stock Items') }}</a> --}}
                </div>
            </div>

            <!-- Stock Overview -->
            <div class="col-span-1 bg-white shadow-md rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">{{ __('Stock Overview') }}</h3>
                <ul>
                    @foreach ($lowStockItems as $item)
                        <li class="mb-2">
                            <span>{{ $item->name }}</span>
                            <span class="text-red-500"> - Low: {{ $item->quantity }}</span>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-4">
                    <a href="{{ route('products') }}" class="text-blue-500">{{ __('View All Stock') }}</a>
                </div>
            </div>

            <!-- Recent Purchases -->
            <div class="col-span-2 bg-white shadow-md rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">{{ __('Recent Purchases') }}</h3>
                <table class="table-auto w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2">{{ __('Order No') }}</th>
                            <th class="px-4 py-2">{{ __('Supplier') }}</th>
                            <th class="px-4 py-2">{{ __('Status') }}</th>
                            <th class="px-4 py-2">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentPurchases as $purchase)
                            <tr>
                                <td class="border px-4 py-2">{{ $purchase->order_number }}</td>
                                <td class="border px-4 py-2">{{ $purchase->supplier->name }}</td>
                                <td class="border px-4 py-2">{{ ucfirst($purchase->status) }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('purchases', $purchase->order_number) }}"
                                        class="text-blue-500">{{ __('View Details') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</x-app-layout>
