<?php

namespace Database\Seeders;

use App\Models\Reason;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reasons = [
            ['name' => ['en' => 'Product is damaged', 'ar' => 'المنتج تالف'], 'active' => 1, 'order_id' => 1],
            ['name' => ['en' => 'Wrong size', 'ar' => 'المقاس غير مناسب'], 'active' => 1, 'order_id' => 2],
            ['name' => ['en' => 'Wrong color', 'ar' => 'اللون غير المطلوب'], 'active' => 1, 'order_id' => 3],
            ['name' => ['en' => 'Received late', 'ar' => 'تم الاستلام متأخرًا'], 'active' => 1, 'order_id' => 4],
        ];

        foreach ($reasons as $reason) {
            Reason::create($reason);
        }
    }
}
