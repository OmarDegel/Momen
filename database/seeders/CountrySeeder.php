<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::create([
            'code' => 'EG',
            'name' => [
                'en' => 'Egypt',
                'ar' => 'مصر',
            ],
            'phone_code' => '20',
            'currency_id' => 1,
            'image' => null,
            'order_id' => 1,
            'active' => 1,
        ]);
    }
}
