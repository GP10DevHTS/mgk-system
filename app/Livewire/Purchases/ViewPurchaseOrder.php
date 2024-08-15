<?php

// namespace App\Livewire\Purchases;

// use App\Models\Purchase;
// use Livewire\Component;

// class ViewPurchaseOrder extends Component
// {
//     public $showDetailsModal = false;
//     public $selectedOrder = null;

//     public function viewDetails($orderId)
//     {
//         $this->selectedOrder = Purchase::with('purchaseItems.product', 'supplier')->find($orderId);
//         $this->showDetailsModal = true;
//     }

//     public function render()
//     {
//         return view('livewire.purchases.view-purchase-order', [
//             'purchaseOrders' => Purchase::with('supplier')->get(),
//         ]);
//     }
// }


namespace App\Livewire\Purchases;

use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Product;
use App\Models\StockCount;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\InteractsWithBanner;

class ViewPurchaseOrder extends Component
{
    use InteractsWithBanner;

    public $showDetailsModal = false;
    public $selectedOrder = null;
    public $deliveryQuantities = [];
    public $isCancelling = false;

    public function viewDetails($orderId)
    {
        $this->selectedOrder = Purchase::with('purchaseItems.product', 'supplier')->find($orderId);
        $this->deliveryQuantities = $this->selectedOrder->purchaseItems->mapWithKeys(function ($item) {
            return [$item->id => $item->delivered_quantity ?? 0];
        })->toArray();
        $this->showDetailsModal = true;
    }

    public function updateDelivery()
    {
        $this->validate([
            'deliveryQuantities.*' => 'nullable|integer|min:0',
        ]);

        foreach ($this->deliveryQuantities as $itemId => $deliveredQuantity) {
            $item = PurchaseItem::find($itemId);
            if ($item) {
                $item->delivered_quantity = $deliveredQuantity;
                $item->save();

                // Update product stock
                $product = $item->product;
                // $product->stock += $deliveredQuantity;
                // $product->save();
                StockCount::create([
                    'product_id' => $product->id,
                    'count' => $deliveredQuantity + $product->latestStockCount(),
                    'created_by' => Auth::id(),
                ]);

                $this->banner('Delivery updated successfully', 'success');

            }
        }

        $this->selectedOrder->status = 'delivered';
        $this->selectedOrder->delivered_at = now();
        $this->selectedOrder->save();

        $this->showDetailsModal = false;
        $this->dispatch('refreshOrders');
    }

    public function cancelOrder()
    {
        $this->selectedOrder->status = 'canceled';
        $this->selectedOrder->save();

        $this->showDetailsModal = false;
        $this->dispatch('refreshOrders');
    }

    public function render()
    {
        return view('livewire.purchases.view-purchase-order', [
            'purchaseOrders' => Purchase::with('supplier')->get(),
        ]);
    }
}
