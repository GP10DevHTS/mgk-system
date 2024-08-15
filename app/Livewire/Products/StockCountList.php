<?php

namespace App\Livewire\Products;

use App\Models\StockCount;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Carbon\Carbon;

class StockCountList extends Component
{
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

    public function render()
    {
        return view('livewire.products.stock-count-list', [
            'stockCounts' => $this->stockCounts,
        ]);
    }
}
