<?php

namespace App\Livewire\Purchases;

use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Jetstream\InteractsWithBanner;

class CreatePurchaseOrder extends Component
{
    use InteractsWithBanner;

    public $suppliers;
    public $products;
    public $selectedSupplier;
    public $items = [];
    public $totalAmount = 0;
    public $orderedAt;
    public $deliveredAt;
    public $receivedBy;

    protected $rules = [
        'selectedSupplier' => 'required|exists:suppliers,id',
        'items.*.product_id' => 'required|exists:products,id',
        'items.*.quantity' => 'required|integer|min:1',
        'items.*.price' => 'required|numeric|min:0',
        'orderedAt' => 'required|date',
        'deliveredAt' => 'nullable|date|after_or_equal:orderedAt',
        'receivedBy' => 'nullable|exists:users,id',
    ];

    public function mount()
    {
        $this->suppliers = Supplier::all();
        $this->products = Product::all();
        $this->orderedAt = now()->format('Y-m-d H:i');

        $this->addItem();
    }

    public function addItem()
    {
        $this->items[] = ['product_id' => null, 'quantity' => 1, 'price' => 0];
    }

    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items); // Re-index the array
        $this->calculateTotalAmount();
    }

    public function calculateTotalAmount()
    {
        $this->totalAmount = array_reduce($this->items, function ($carry, $item) {
            return $carry + ($item['quantity'] * $item['price']);
        }, 0);
    }

    public function save()
    {
        $this->validate();

        $purchase = Purchase::create([
            'order_number' => $this->generateOrderNumber(),
            'supplier_id' => $this->selectedSupplier,
            'status' => 'pending',
            'total_amount' => $this->totalAmount,
            'ordered_at' => $this->orderedAt,
            'delivered_at' => $this->deliveredAt,
            'received_by' => $this->receivedBy,
        ]);

        foreach ($this->items as $item) {
            $purchase->purchaseItems()->create($item);
        }

        // session()->flash('message', 'Purchase order created successfully.');

        $this->banner('Purchase order created successfully.', 'success');

        $this->reset(['items', 'totalAmount', 'orderedAt', 'deliveredAt', 'receivedBy']);
    }

    protected function generateOrderNumber()
    {
        return 'PO-' . Str::upper(Str::random(6)) . '-' . now()->format('Ymd');
    }

    public function render()
    {
        return view('livewire.purchases.create-purchase-order');
    }
}
