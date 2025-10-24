<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i++) {
            Region::create([
                'name' => [
                    'en' => 'Region ' . $i,
                    'ar' => 'المنطقة ' . $i,
                ],
                'shipping' => rand(0, 100),
                'city_id' => rand(1, 10),
                'active' => rand(0, 1),
                'order_id' => $i
            ]);
        }
    }
}
