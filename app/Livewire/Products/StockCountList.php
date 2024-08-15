<?php

namespace App\Livewire\Products;

use App\Models\StockCount;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Carbon\Carbon;
use Laravel\Jetstream\InteractsWithBanner;

class StockCountList extends Component
{
    use InteractsWithBanner;

    public $filterByUser = false; // Toggle to filter by current user

    public function toggleUserFilter()
    {
        $this->filterByUser = !$this->filterByUser;
    }

    public function getStockCountsProperty()
    {
        // Query for today's stock counts
        $query = StockCount::whereDate('created_at', Carbon::today());

        // Optionally filter by the current user
        if ($this->filterByUser) {
            $query->where('created_by', Auth::id());
        }

        return $query->get();
    }

    public function deleteStockCount($stockCountId)
    {
        $stockCount = StockCount::find($stockCountId);

        if ($stockCount && $stockCount->created_by == Auth::id()) {
            $stockCount->delete(); // Soft delete
            // session()->flash('message', 'Stock count deleted successfully.');
            $this->banner('Stock count deleted successfully.', 'success');
        } else {
            // session()->flash('error', 'You are not authorized to delete this stock count.');
            $this->banner('You are not authorized to delete this stock count.', 'error');
        }
    }

    public function render()
    {
        return view('livewire.products.stock-count-list', [
            'stockCounts' => $this->stockCounts,
        ]);
    }
}
