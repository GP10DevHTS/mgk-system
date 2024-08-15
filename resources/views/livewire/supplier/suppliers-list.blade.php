<div wire:poll>
    <div class="overflow-x-auto">
        <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">{{ __('Name') }}</th>
                    <th class="px-4 py-2">{{ __('Contact Information') }}</th>
                    <th class="px-4 py-2">{{ __('Address') }}</th>
                    <th class="px-4 py-2">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($suppliers as $supplier)
                    <tr>
                        <td class="border px-4 py-2">{{ $supplier->name }}</td>
                        <td class="border px-4 py-2">{{ $supplier->contact_information }}</td>
                        <td class="border px-4 py-2">{{ $supplier->address }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex items-center space-x-2">
                                @if ($supplier->trashed())
                                    <x-button wire:click="restoreSupplier({{ $supplier->id }})">
                                        {{ __('Restore') }}
                                    </x-button>
                                @else
                                    <x-danger-button wire:click="deleteSupplier({{ $supplier->id }})">
                                        {{ __('Delete') }}
                                    </x-danger-button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center p-4">{{ __('No suppliers found.') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
