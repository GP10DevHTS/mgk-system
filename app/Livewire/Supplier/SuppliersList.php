<?php

namespace App\Livewire\Supplier;

use App\Models\Supplier;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class SuppliersList extends Component
{

    use InteractsWithBanner;

    public function render()
    {
        return view('livewire.supplier.suppliers-list',[
            'suppliers' => Supplier::withTrashed()->get(),
        ]);
    }

    
    public function restoreSupplier($id){
        $supplier = Supplier::onlyTrashed()->where('id', $id)->first();
        $supplier->restore();
        $this->banner('Supplier restored successfully.', 'success');
    }

    public function deleteSupplier($id){
        $supplier = Supplier::where('id', $id)->first();
        $supplier->delete();
        $this->banner('Supplier deleted successfully.', 'success');
    }
}
