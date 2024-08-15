<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;

class ProductPurchaseHistory extends Component
{

    public $product;
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
        $this->validate([
            'startDate' => 'required|date|before_or_equal:endDate',
            'endDate' => 'required|date|after_or_equal:startDate',
        ]);
    }

    public function render()
    {
        $purchaseHistory = $this->product->purchaseItems()
            ->whereHas('purchase', function ($query) {
                $query->whereBetween('ordered_at', [$this->startDate, $this->endDate]);
            })
            ->with('purchase.supplier')
            ->get();

        return view('livewire.products.product-purchase-history', compact('purchaseHistory'));
    }
}
