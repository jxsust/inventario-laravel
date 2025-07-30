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
        $categories=[
            [
                'name' => 'Electronics',
                'description' => 'articulos electronicos',
            ],
            [
                'name' => 'ropa',
                'description' => 'Articulos de vestir',
            ],
            [
                'name' => 'Hogar',
                'description' => 'Articulos para el hogar',
            ],
            [
                'name' => 'Deportes',
                'description' => 'Articulos deportivos',
            ],
            [
                'name' => 'Jardineria',
                'description' => 'Articulos de jardineria',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
