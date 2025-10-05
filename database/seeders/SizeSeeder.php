<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Size::create([
                'name' => [
                    'en' => 'Size ' . $i,
                    'ar' => 'الحجم ' . $i
                ],
                'active' => rand(0, 1),
                'order_id' => $i
            ]);
        }
    }
}
