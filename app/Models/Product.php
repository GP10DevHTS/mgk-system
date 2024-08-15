<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'current_stock',
        'min_stock',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class)->withTrashed();
    }

    public function stockCounts()
    {
        return $this->hasMany(StockCount::class);
    }

    /**
     * Get the latest stock count for the product.
     *
     * @return int
     */
    public function latestStockCount()
    {
        $latestStockCount = $this->stockCounts()
            ->latest('created_at')
            ->first();

        // Return the count or 0 if no stock count exists
        return $latestStockCount ? $latestStockCount->count : 0;
    }
}
