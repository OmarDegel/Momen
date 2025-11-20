<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $cities = [
            ['name' => ['ar' => 'القاهرة', 'en' => 'Cairo']],
            ['name' => ['ar' => 'الجيزة', 'en' => 'Giza']],
            ['name' => ['ar' => 'الإسكندرية', 'en' => 'Alexandria']],
            ['name' => ['ar' => 'القليوبية', 'en' => 'Qalyubia']],
            ['name' => ['ar' => 'المنوفية', 'en' => 'Monufia']],
            ['name' => ['ar' => 'الشرقية', 'en' => 'Sharqia']],
            ['name' => ['ar' => 'الغربية', 'en' => 'Gharbia']],
            ['name' => ['ar' => 'الدقهلية', 'en' => 'Dakahlia']],
            ['name' => ['ar' => 'البحيرة', 'en' => 'Beheira']],
            ['name' => ['ar' => 'كفر الشيخ', 'en' => 'Kafr El Sheikh']],
            ['name' => ['ar' => 'دمياط', 'en' => 'Damietta']],
            ['name' => ['ar' => 'بورسعيد', 'en' => 'Port Said']],
            ['name' => ['ar' => 'الإسماعيلية', 'en' => 'Ismailia']],
            ['name' => ['ar' => 'السويس', 'en' => 'Suez']],
            ['name' => ['ar' => 'مطروح', 'en' => 'Matrouh']],
            ['name' => ['ar' => 'جنوب سيناء', 'en' => 'South Sinai']],
            ['name' => ['ar' => 'شمال سيناء', 'en' => 'North Sinai']],
            ['name' => ['ar' => 'الفيوم', 'en' => 'Faiyum']],
            ['name' => ['ar' => 'بني سويف', 'en' => 'Beni Suef']],
            ['name' => ['ar' => 'المنيا', 'en' => 'Minya']],
            ['name' => ['ar' => 'أسيوط', 'en' => 'Asyut']],
            ['name' => ['ar' => 'سوهاج', 'en' => 'Sohag']],
            ['name' => ['ar' => 'قنا', 'en' => 'Qena']],
            ['name' => ['ar' => 'الأقصر', 'en' => 'Luxor']],
            ['name' => ['ar' => 'أسوان', 'en' => 'Aswan']],
            ['name' => ['ar' => 'البحر الأحمر', 'en' => 'Red Sea']],
            ['name' => ['ar' => 'الوادي الجديد', 'en' => 'New Valley']],
        ];


        foreach ($cities as $index => $city) {
            City::create([
                'name' => $city['name'],
                'country_id' => 1, 
                'order_id' => $index + 1,
                'active' => 1,
            ]);
        }
    }
}
