<?php

namespace App\Livewire\Products;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Laravel\Jetstream\InteractsWithBanner;

class NewProductModal extends Component
{
    use InteractsWithBanner;

    public $showModal = false;
    public $name;
    public $description;
    public $category_id;
    public $min_stock;
    public $current_stock;

    protected $rules = [
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'description' => 'nullable|string',
        'min_stock' => 'nullable|integer|min:0',
        'current_stock' => 'nullable|integer|min:0',
    ];


    public function openCreateProductModal()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function createProduct()
    {
        $this->validate();

        Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'min_stock' => $this->min_stock ?? 10,
            'current_stock' => $this->current_stock ?? 0,
        ]);

        $this->resetForm();
        $this->showModal = false;
        $this->banner('Product added successfully.', 'success');
    }

    private function resetForm()
    {
        $this->name = '';
        $this->description = '';
        $this->category_id = '';
        $this->min_stock = null;
        $this->current_stock = null;
    }

    public function render()
    {
        return view('livewire.products.new-product-modal', [
            'categories' => Category::all()
        ]);
    }
}
