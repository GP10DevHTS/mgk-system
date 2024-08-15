<?php

namespace App\Livewire\Supplier;

use App\Models\Supplier;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class NewSupplierModal extends Component
{ 
    use InteractsWithBanner;

    public $name;
    public $contactInformation;
    public $address;
    public $showModal = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'contactInformation' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
    ];

    public function render()
    {
        return view('livewire.supplier.new-supplier-modal');
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->reset(['name', 'contactInformation', 'address']);
        $this->showModal = false;
    }

    public function save()
    {
        $this->validate();

        Supplier::create([
            'name' => $this->name,
            'contact_information' => $this->contactInformation,
            'address' => $this->address,
        ]);

        $this->closeModal();
        $this->dispatch('supplierAdded');

        $this->banner('Supplier created successfully.', 'success');
    }

    public function resetForm()
    {
        $this->reset(['name', 'contactInformation', 'address']);
    }

}
