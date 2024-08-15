<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\StockCount;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestStockCountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 3 users
        $users = User::factory()->count(3)->create();

        // Create a few sample products
        $products = Product::factory()->count(5)->create(); // Assuming the Product factory exists

        // Assign random stock counts for today for each user
        foreach ($users as $user) {
            foreach ($products as $product) {
                StockCount::create([
                    'product_id' => $product->id,
                    'count' => rand(10, 100), // Random stock count between 10 and 100
                    'created_by' => $user->id,
                    'created_at' => now(),
                ]);
            }
        }
    }
}
