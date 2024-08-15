<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ViewProduct extends Component
{
    public $product;

    public function mount($uuid){
        $this->product = Product::where('uuid', $uuid)->first();
    }

    public function render()
    {
        return view('livewire.products.view-product');
    }
}
