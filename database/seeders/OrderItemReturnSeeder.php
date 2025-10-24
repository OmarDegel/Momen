<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\OrderItemReturn;

class OrderItemReturnSeeder extends Seeder
{
    public function run(): void
    {
        // اختياري: امسح القديم
        DB::table('order_item_returns')->truncate();

        // افترض ان Order relation 'orderItems' معرفة
        $orders = Order::with(['orderItems' => function ($q) {
            $q->where('is_return', 1);
        }])->get();

        DB::transaction(function () use ($orders) {
            foreach ($orders as $order) {
                $items = $order->orderItems;
                if ($items->isEmpty()) {
                    continue;
                }

                // مثال: نختار عينة عشوائية من 1 إلى 3 عناصر أو نسبة 30%
                $sample = $items->count() > 1
                    ? $items->random(min(rand(1, 3), $items->count()))
                    : $items;

                foreach ($sample as $item) {
                    $orderItemReturn = OrderItemReturn::create([
                        'user_id' => $order->user_id,
                        'order_id' => $order->id,
                        'order_item_id' => $item->id,
                        'reason_id' => rand(1, 5),
                        'coupon_id' => $order->coupon_id ?? null,
                        'amount' => $item->amount ?? 1,
                        'price' => $item->price ?? 0,
                        'price_return' => $item->price ?? 0,
                        'total_price_return' => ($item->price ?? 0) * ($item->amount ?? 1),
                        'status' => ['pending','approved','rejected'][array_rand(['pending','approved','rejected'])],
                        'is_returned' => 0,
                        'note' => Str::limit('Auto-generated return for testing seeder ' . Str::random(8), 250),
                        // 'requested_at' => now(), // لو محتاج الحقل ضيفه في $fillable داخل الموديل
                    ]);

                    // اختياري: لو عايز تحدّث الـ OrderItem بأن تم تقديم طلب رجوع (مثلاً)
                    // $item->update(['is_return' => 1, 'return_at' => now()]);

                    // اختياري: لو عايز تحدث حقل في الـ Order (كم مجموع مرتجع)
                    // $order->increment('price_returned', $orderItemReturn->total_price_return);
                }
            }
        });
    }
}
