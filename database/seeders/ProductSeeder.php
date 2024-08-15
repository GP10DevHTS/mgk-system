<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $beers = Category::where('name', 'Beers')->first()->id;
        $soda = Category::where('name', 'Soda')->first()->id;
        $water = Category::where('name', 'Water')->first()->id;
        $juice = Category::where('name', 'Juice')->first()->id;

        $products = [
            // Beers
            ['name' => 'Heineken', 'description' => 'Premium beer', 'category_id' => $beers,  'min_stock' => 10],
            ['name' => 'Corona', 'description' => 'Mexican beer', 'category_id' => $beers, 'min_stock' => 10],

            // Soda
            ['name' => 'Coca-Cola', 'description' => 'Classic soft drink', 'category_id' => $soda,  'min_stock' => 20],
            ['name' => 'Fanta', 'description' => 'Orange flavored soda', 'category_id' => $soda,  'min_stock' => 20],

            // Water
            ['name' => 'Evian', 'description' => 'Premium bottled water', 'category_id' => $water,  'min_stock' => 30],
            ['name' => 'Aquafina', 'description' => 'Purified water', 'category_id' => $water, 'min_stock' => 30],

            // Juice
            ['name' => 'Orange Juice', 'description' => 'Freshly squeezed orange juice', 'category_id' => $juice, 'min_stock' => 10],
            ['name' => 'Apple Juice', 'description' => 'Fresh apple juice', 'category_id' => $juice, 'min_stock' => 10],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
