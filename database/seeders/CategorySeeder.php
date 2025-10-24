<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Category::create(
                [
                    'name' => [
                        'en' => 'Category ' . $i,
                        'ar' => 'تصنيف ' . $i,
                    ],
                    'content' => [
                        'en' => 'Category ' . $i,
                        'ar' => 'تصنيف ' . $i,
                    ],
                    "image" => null,
                    "parent_id" => null,
                    "active" => rand(0, 1),
                    "order_id" => $i
                ]
            );
        }
    }
}
