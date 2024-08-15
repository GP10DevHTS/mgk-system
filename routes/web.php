<?php

use App\Livewire\Products\ShowProducts;
use App\Livewire\Products\ShowStockCounts;
use App\Livewire\Products\ViewProduct;
use App\Livewire\Purchases\ShowPurchases;
use App\Livewire\Supplier\ShowSuppliers;
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
        return view('dashboard');
    })->name('dashboard');

    Route::get('/products', ShowProducts::class)->name('products');
    Route::get('/products/view/{uuid}', ViewProduct::class)->name('product.view');
    Route::get('/stock-counts', ShowStockCounts::class)->name('stock-counts');
    Route::get('/purchases', ShowPurchases::class)->name('purchases');
    Route::get('/suppliers', ShowSuppliers::class)->name('suppliers');
});
