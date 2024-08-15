<div>

    <x-form-section submit="">
        <x-slot name="title">
            {{ __('Purchase Order Details') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Enter the details for the new purchase order.') }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6">
                <div class="grid grid-cols-12 gap-6">
                    <!-- Supplier Selection -->
                    <div class="col-span-6">
                        <x-label for="supplier" value="{{ __('Supplier') }}" />
                        <select id="supplier" wire:model="selectedSupplier" placeholder="Select Supplier">
                            <option value="">Select Supplier</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="selectedSupplier" class="mt-2" />
                    </div>

                    <div class="col-span-6">
                        <x-label for="orderedAt" value="{{ __('Order Date') }}" />
                        <x-input id="orderedAt" type="datetime-local" wire:model="orderedAt" placeholder="Order Date" />
                        <x-input-error for="orderedAt" class="mt-2" />
                    </div>
                </div>
            </div>

            <!-- Items Table -->
            <div class="col-span-6">
                <x-label for="items" value="{{ __('Items') }}" />
                <table class="table-auto w-full">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">{{ __('Product') }}</th>
                            <th class="px-4 py-2">{{ __('Quantity') }}</th>
                            <th class="px-4 py-2">{{ __('Price') }}</th>
                            <th class="px-4 py-2">{{ __(' ') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $index => $item)
                            <tr>
                                <td class="border px-4 py-2">
                                    {{-- <x-select wire:model="items.{{ $index }}.product_id" :options="$products->pluck('name', 'id')" placeholder="Select Product" /> --}}
                                    <select wire:model="items.{{ $index }}.product_id"
                                        placeholder="Select Product">
                                        <option value="">Select Product</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error for="items.{{ $index }}.product_id" class="mt-2" />
                                </td>
                                <td class="border px-4 py-2">
                                    <x-input type="number" wire:model="items.{{ $index }}.quantity"
                                        min="1" placeholder="Quantity" />
                                    <x-input-error for="items.{{ $index }}.quantity" class="mt-2" />
                                </td>
                                <td class="border px-4 py-2">
                                    <x-input type="number" wire:model="items.{{ $index }}.price" step="0.01"
                                        min="0" placeholder="Price" />
                                    <x-input-error for="items.{{ $index }}.price" class="mt-2" />
                                </td>
                                <td class="border px-4 py-2">
                                    <x-button wire:click="removeItem({{ $index }})"
                                        class="bg-red-500 hover:bg-red-700 text-white">{{ __('X') }}</x-button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <x-button wire:click="addItem"
                    class="bg-blue-500 hover:bg-blue-700 text-white">{{ __('Add Item') }}</x-button>
            </div>

            <!-- Total Amount -->
            <div class="col-span-6 mt-4">
                <x-label for="totalAmount" value="{{ __('Total Amount') }}" />
                <x-input id="totalAmount" type="text" readonly wire:model="totalAmount" placeholder="Total Amount" />
                <x-input-error for="totalAmount" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-button wire:click="$set('showModal', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-button>

            <x-button class="ml-2" wire:click="save" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-form-section>

</div>
