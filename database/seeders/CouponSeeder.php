<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 3; $i++) {

            Coupon::create([
                'name' => [
                    'en' => fake()->word(),
                    'ar' => fake()->word(),
                ],
                'content' => [
                    'en' => fake()->text(),
                    'ar' => fake()->text(),
                ],
                'code' => 'SALE10',
                'type' => 'percentage',
                'discount' => 10,
                'min_order' => 100,
                'max_discount' => 200,
                'user_limit' => 1,
                'use_limit' => 100,
                'use_count' => 0,
                'count_used' => 0,
                'date_start' => Carbon::now(),
                'date_expire' => Carbon::now()->addMonth(),
                'order_id' => 1,
                'finish' => 0,
                'active' => 1,
            ]);
        }
    }
}
