<?php

namespace Database\Seeders;

use App\Models\OrderReject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderRejectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rejects = [
            ['name' => ['en' => 'Customer canceled the order', 'ar' => 'العميل ألغى الطلب'], 'active' => 1, 'order_id' => 1],
            ['name' => ['en' => 'Out of stock', 'ar' => 'المنتج غير متوفر'], 'active' => 1, 'order_id' => 2],
            ['name' => ['en' => 'Payment issue', 'ar' => 'مشكلة في الدفع'], 'active' => 1, 'order_id' => 3],
            ['name' => ['en' => 'Address not reachable', 'ar' => 'العنوان غير قابل للتوصيل'], 'active' => 1, 'order_id' => 4],
        ];

        foreach ($rejects as $reject) {
            OrderReject::create($reject);
        }
    }
}
