<div>
    <x-button wire:click="openModal">New Supplier</x-button>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <x-dialog-modal wire:model="showModal">
        <x-slot name="title">
            {{ __('Add New Supplier') }}
        </x-slot>

        <x-slot name="content">
            <div class="space-y-4">
                <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name"
                    placeholder="Supplier Name" />
                <x-input id="contactInformation" type="text" class="mt-1 block w-full"
                    wire:model.defer="contactInformation" placeholder="Contact Information" />
                <x-input id="address" type="text" class="mt-1 block w-full" wire:model.defer="address"
                    placeholder="Address" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeModal" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ml-2" wire:click="save" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

</div>
