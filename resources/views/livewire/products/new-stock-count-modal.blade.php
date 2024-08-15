<div>
    {{-- The Master doesn't talk, he acts. --}}
    <x-form-section submit="">
        <x-slot name="title">
            {{ __('Stock Count Information') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Search and select a product, then record its current stock count.') }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6">
                <x-validation-errors class="mb-4" />
            </div>
            <!-- Product Search -->
            <div class="col-span-6">
                <x-label for="search" value="{{ __('Search Product') }}" />
                <x-input id="search" type="text" class="mt-1 block w-full" wire:model.live.debounce.300ms="search"
                    autocomplete="off" />
                <x-input-error for="search" class="mt-2" />

                @if ($products)
                    <ul
                        class="mt-2 bg-white border border-gray-200 divide-y divide-gray-200 rounded-md max-h-40 overflow-auto">
                        @foreach ($products as $product)
                            <li wire:click="selectProduct({{ $product->id }})"
                                class="cursor-pointer hover:bg-gray-100 px-4 py-2">
                                {{ $product->name }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <!-- Selected Product Display -->
            @if ($selectedProduct)
                <div class="col-span-6">
                    <x-label value="{{ __('Selected Product') }}" />
                    <div class="mt-1 p-2 bg-gray-100 rounded-md">
                        {{ $selectedProduct->name }}
                    </div>
                </div>
            @endif

            <!-- Stock Count -->
            <div class="col-span-6">
                <x-label for="count" value="{{ __('Current Stock Count') }}" />
                <x-input id="count" type="number" class="mt-1 block w-full" wire:model.defer="count"
                    autocomplete="off" />
                <x-input-error for="count" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-secondary-button wire:click="resetForm">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ml-2" wire:click="createStockCount">
                {{ __('Save Stock Count') }}
            </x-button>
        </x-slot>
    </x-form-section>

</div>
