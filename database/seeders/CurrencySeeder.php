<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('currencies')->insert([
            [
                'code' => 'USD',
                'name' => json_encode([
                    'en' => 'US Dollar',
                    'ar' => 'الدولار الأمريكي',
                ]),
                'order_id' => 1,
                'active' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'code' => 'EUR',
                'name' => json_encode([
                    'en' => 'Euro',
                    'ar' => 'اليورو',
                ]),
                'order_id' => 2,
                'active' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'code' => 'EGP',
                'name' => json_encode([
                    'en' => 'Egyptian Pound',
                    'ar' => 'الجنيه المصري',
                ]),
                'order_id' => 3,
                'active' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
