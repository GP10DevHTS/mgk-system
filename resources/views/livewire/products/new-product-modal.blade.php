<div>
    <x-button class="ml-4" wire:click="openCreateProductModal">
        {{ __('New Product') }}
    </x-button>


    <x-dialog-modal wire:model="showModal">
        <x-slot name="title">
            {{ __('Create New Product') }}
        </x-slot>

        <x-slot name="content">
            <x-form-section submit="createProduct">
                <x-slot name="title">
                    {{ __('Product Information') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Enter the details for the new product.') }}
                </x-slot>

                <x-slot name="form">
                    <!-- Product Name -->
                    <div class="col-span-6">
                        <x-label for="name" value="{{ __('Product Name') }}" />
                        <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name"
                            autocomplete="name" />
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <!-- Category -->
                    <div class="col-span-6">
                        <x-label for="category_id" value="{{ __('Category') }}" />
                        <select id="category_id" wire:model.defer="category_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="">{{ __('Select a Category') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="category_id" class="mt-2" />
                    </div>

                    <!-- Description -->
                    <div class="col-span-6">
                        <x-label for="description" value="{{ __('Description') }}" />
                        <textarea id="description"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            wire:model.defer="description"></textarea>
                        <x-input-error for="description" class="mt-2" />
                    </div>

                    <!-- Min Stock -->
                    <div class="col-span-6">
                        <x-label for="min_stock" value="{{ __('Minimum Stock') }}" />
                        <x-input id="min_stock" type="number" class="mt-1 block w-full" wire:model.defer="min_stock"
                            autocomplete="min_stock" />
                        <x-input-error for="min_stock" class="mt-2" />
                    </div>

                    <!-- Current Stock -->
                    <div class="col-span-6">
                        <x-label for="current_stock" value="{{ __('Current Stock') }}" />
                        <x-input id="current_stock" type="number" class="mt-1 block w-full"
                            wire:model.defer="current_stock" autocomplete="current_stock" />
                        <x-input-error for="current_stock" class="mt-2" />
                    </div>
                </x-slot>
            </x-form-section>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showModal', false)">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ml-2" wire:click="createProduct">
                {{ __('Save Product') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>


    </>
