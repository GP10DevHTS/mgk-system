<?php

namespace App\Livewire\Products;

use App\Models\Product;
use App\Models\StockCount;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class NewStockCountModal extends Component
{
    use InteractsWithBanner;

    public $showModal = false;
    public $search = '';
    public $selectedProduct = null;
    public $count;

    protected $rules = [
        'selectedProduct.id' => 'required|exists:products,id',
        'count' => 'required|integer|min:0',
    ];

    public function openCreateStockCountModal()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function updatedSearch()
    {
        $this->reset('selectedProduct');
    }

    public function selectProduct($productId)
    {
        $this->selectedProduct = Product::find($productId);
    }

    public function createStockCount()
    {
        $this->validate();

        StockCount::create([
            'product_id' => $this->selectedProduct->id,
            'count' => $this->count,
            'created_by' => Auth::id(),
        ]);

        $this->resetForm();
        $this->showModal = false;

        $this->banner('Stock count recorded successfully.', 'success');
    }

    private function resetForm()
    {
        $this->search = '';
        $this->selectedProduct = null;
        $this->count = null;
    }

    public function getProductsProperty()
    {
        if ($this->search) {
            return Product::where('name', 'like', '%' . $this->search . '%')->get();
        }
        return [];
    }

    public function render()
    {
        return view('livewire.products.new-stock-count-modal', [
            'products' => $this->products
        ]);
    }
}
