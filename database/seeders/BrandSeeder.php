<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Brand::create([
                'name' => [
                    'en' => 'Brand ' . $i,
                    'ar' => 'العلامة التجارية ' . $i,
                ],
                'active' => rand(0, 1),
                "image" => "uploads/brands/default.png",
                'order_id' => $i
            ]);
        }
    }
}
