<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\Size;
use App\Models\Color;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {

            // إنشاء الأب
            $parentData = $this->getParentData();
            $product = Product::create($parentData);

            // ربط كاتيجوريز
            $categoryIds = Category::inRandomOrder()->limit(rand(1, 3))->pluck('id')->toArray();
            $product->categories()->sync($categoryIds);

            // إضافة ألوان وصور للمنتج
            $colorIds = Color::inRandomOrder()->limit(rand(1, 3))->pluck('id')->toArray();
            foreach ($colorIds as $colorId) {
                $this->createProductColor($product->id, $colorId);
            }

            // إنشاء الأبناء (variants) لو عايز
            if (rand(0, 1) == 1) {
                $children = $this->getChildrenData($product->id, $parentData['price'], $colorIds);
                foreach ($children as $childData) {
                    Product::create($childData);
                }
            }
        }
    }

    private function getParentData(): array
    {
        return [
            'brand_id' => rand(1, 5),
            'size_id' => null,
            'color_id' => null,
            'parent_id' => null,
            'name' => [
                'en' => fake()->words(2, true),
                'ar' => fake('ar_SA')->words(2, true),
            ],
            'link' => fake()->url(),
            'code' => fake()->unique()->bothify('PROD-####'),
            'type' => 'simple',
            'status' => 1,
            'image' => 'uploads/products/default.png',
            'content' => [
                'en' => fake()->sentence(),
                'ar' => fake('ar_SA')->sentence(),
            ],
            'price' => rand(100, 1000),
            'offer_price' => rand(0, 1) ? rand(50, 500) : null,
            'max_amount' => rand(10, 50),
            'order_limit' => rand(1, 5),
            'order_max' => rand(5, 20),
            'date_start' => now(),
            'date_expire' => now()->addMonth(),
            'active' => 1,
            'is_offer' => rand(0, 1),
            'is_color' => 1,
            'is_size' => 1,
        ];
    }

    private function getChildrenData($parentId, $basePrice, array $parentColors): array
    {
        $children = [];
        $sizes = Size::inRandomOrder()->limit(rand(2, 4))->pluck('id')->toArray();

        foreach ($sizes as $size) {
            foreach ($parentColors as $color) {
                $children[] = [
                    'brand_id' => rand(1, 5),
                    'size_id' => $size,
                    'color_id' => $color,
                    'parent_id' => $parentId,
                    'name' => [
                        'en' => fake()->words(3, true),
                        'ar' => fake('ar_SA')->words(3, true),
                    ],
                    'link' => fake()->url(),
                    'code' => fake()->unique()->bothify('CHILD-####'),
                    'type' => 'variant',
                    'status' => 1,
                    'image' => 'uploads/products/default.png',
                    'content' => [
                        'en' => fake()->sentence(),
                        'ar' => fake('ar_SA')->sentence(),
                    ],
                    'price' => $basePrice + rand(-20, 50),
                    'offer_price' => rand(0, 1) ? rand(50, $basePrice) : null,
                    'max_amount' => rand(10, 50),
                    'order_limit' => rand(1, 5),
                    'order_max' => rand(5, 20),
                    'date_start' => now(),
                    'date_expire' => now()->addMonth(),
                    'active' => 1,
                    'is_offer' => rand(0, 1),
                    'is_color' => 1,
                    'is_size' => 1,
                ];
            }
        }

        return $children;
    }

    private function createProductColor($productId, $colorId): void
    {
        $images = [
            'uploads/products/sample1.png',
            'uploads/products/sample2.png',
            'uploads/products/sample3.png',
        ];

        Product::find($productId)->colors()->attach($colorId);

        foreach ($images as $img) {
            ProductGallery::create([
                'product_id' => $productId,
                'image' => $img,
            ]);
        }
    }
}
