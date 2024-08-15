<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;

class ProductStockHistory extends Component
{public $product;
    public $startDate;
    public $endDate;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->endDate = Carbon::now()->endOfMonth()->format('Y-m-d');
    }

    public function updated($field)
    {
        // Ensure dates are valid if user changes them
        $this->validate([
            'startDate' => 'required|date|before_or_equal:endDate',
            'endDate' => 'required|date|after_or_equal:startDate',
        ]);
    }

    public function render()
    {
        $stockMovements = $this->product->stockCounts()->withTrashed()
            ->whereBetween('created_at', [$this->startDate, $this->endDate])
            ->get();

        return view('livewire.products.product-stock-history', compact('stockMovements'));
    }
}
