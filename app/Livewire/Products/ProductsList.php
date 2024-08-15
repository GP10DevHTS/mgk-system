<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ProductsList extends Component
{
    public function render()
    {
        $products = Product::all();
        return view('livewire.products.products-list', [
            'products' => $products
        ]);
    }
}
