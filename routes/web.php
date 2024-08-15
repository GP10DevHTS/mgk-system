<?php

use App\Livewire\Products\ShowProducts;
use App\Livewire\Products\ShowStockCounts;
use App\Livewire\Products\ViewProduct;
use App\Livewire\Purchases\ShowPurchases;
use App\Livewire\Supplier\ShowSuppliers;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/login');
Route::redirect('/register', '/login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $lowStockItems = Product::where('current_stock', '<=', 'min_stock')->get();
        $recentPurchases = Purchase::orderBy('ordered_at', 'desc')->take(5)->get();

        return view('dashboard', compact('lowStockItems', 'recentPurchases'));
    })->name('dashboard');

    Route::get('/products', ShowProducts::class)->name('products');
    Route::get('/products/view/{uuid}', ViewProduct::class)->name('product.view');
    Route::get('/stock-counts', ShowStockCounts::class)->name('stock-counts');
    Route::get('/purchases', ShowPurchases::class)->name('purchases');
    Route::get('/suppliers', ShowSuppliers::class)->name('suppliers');
});
