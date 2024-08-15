<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Beers', 'description' => 'Various types of beers'],
            ['name' => 'Soda', 'description' => 'Soft drinks and sodas'],
            ['name' => 'Water', 'description' => 'Bottled water'],
            ['name' => 'Juice', 'description' => 'Fresh fruit juices'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
